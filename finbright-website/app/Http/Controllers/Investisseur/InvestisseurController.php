<?php

namespace App\Http\Controllers\Investisseur;

use Illuminate\Validation\Rule;
use App\Models\Files;
use App\Models\UserDocument;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ParametresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class InvestisseurController extends Controller
{
    public function profil(ParametresController $parametres)
    {
        Session::put('menu_actif', 'mon_compte');
        $investisseur = Auth::user()->investisseur;

        if ($investisseur->type_of_lender == "Personne physique") {
            $documentsAttendus = [
                'piece_identite' => "Pièce d'identité en cours de validité (CNI recto-verso ou Passeport, Titre de séjour pour les étrangers)",
                'justificatif_domicile' => "Justificatif de domicile de moins de 3 mois",
                'justificatif_activite_pro' => "Justificatif d'activité professionnelle",
                'declaration_origine_fonds' => "Déclaration sur l'origine des fonds",
            ];
        }
        else {
            $documentsAttendus = [
                'statuts_a_jour_signes' => "Statuts à jour et signés",
                'recepisse_de_declaration' => "Récépissé de déclaration en préfecture ou extrait de parution au JOAFE",
                'liste_des_membres_du_conseil' => "Liste des membres du conseil d'administration",
            ];
        }
        $investisseur = Auth::user()->investisseur;

        $countries = $parametres->getContries();
        $userDocuments = Auth::user()->documents->keyBy('type');
        $documentsGroupByType = Auth::user()->documents->groupBy('type');

        return view('back.investisseur.mon-profil', compact([
            'documentsAttendus',
            'userDocuments',
            'documentsGroupByType',
            'countries'
        ]));
    }
    
    // ProfilController.php
    public function evaluerProfil(Request $request)
    {
        $data = $request->all();
        $score = 0;

        // --- Situation financière ---
        if (($data['renevu_foyer_fiscal'] ?? '') === '+40000') $score += 2;
        if (($data['patrinoine_financier'] ?? '') === '+50000') $score += 2;

        // --- Expérience ---
        if (($data['deja-investi'] ?? '') === 'oui') $score += 2;
        if (($data['deja_prete'] ?? '') === 'oui') $score += 2;
        if (($data['affirmation_correcte'] ?? '') === 'b') $score += 2;

        // --- Objectifs & horizon ---
        if (($data['temps_de_pret'] ?? '') === '+7 ans') $score += 2;
        if (($data['temps_de_pret'] ?? '') === '5 - 7 ans') $score += 1;

        // --- Tolérance au risque ---
        if (($data['reaction_apres_defaults'] ?? '') === 'fait partir des risques') $score += 2;
        if (($data['reaction_apres_defaults'] ?? '') === 'inquiet') $score += 1;

        // --- Part à consacrer placement risqué ---
        if (($data['part_a_consacrer'] ?? '') === '5% - 10%') $score += 1;
        if (($data['part_a_consacrer'] ?? '') === '+10%') $score += 2;

        // Déterminer le profil
        $profil = [
            'profil' => 'Prudent',
            'score' => $score,
            'message' => "Votre profil suggère une forte sensibilité au risque. 
            Nous vous rappelons que le prêt participatif comporte un risque de perte en capital. 
            Il est recommandé de n'y consacrer qu'une faible part de votre épargne et de bien diversifier vos prêts."
        ];

        if ($score >= 4 && $score <= 6) {
            $profil = [
                'profil' => 'Équilibré',
                'score' => $score,
                'message' => "Votre profil suggère un équilibre entre prudence et recherche de rendement. 
                Vous êtes prêt(e) à prendre un certain risque, mais la diversification reste essentielle."
            ];
        } elseif ($score > 6) {
            $profil = [
                'profil' => 'Averti',
                'score' => $score,
                'message' => "Votre profil montre une bonne tolérance au risque et une certaine expérience. 
                Le prêt participatif reste risqué : veillez à diversifier vos investissements et à ne pas dépasser une part raisonnable de votre épargne."
            ];
        }

        // Exemple d’enregistrement en BDD
        $user = Auth::user();
        $user->investisseur->update([
            'profile' => $profil,
        ]);
        
        return response()->json([
            'success' => true,
            'evaluation' => $profil,
        ]);
    }

    public function updateProfil(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'civilite' => 'required|in:M.,Mme.,Mx.',
            'firstname' => 'nullable|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'birth_date' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'birth_place' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'profession' => 'nullable|string|max:255',
            'ppe' => 'nullable|integer',
            'adresse' => 'nullable|string|max:255',
            'fonction' => 'nullable|string|max:255',
            'piece_identite.*' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);
        
        // 1. Upload avatar si présent
        if ($request->hasFile('avatar')) {
            // Supprimer l'ancien avatar
            if ($user->profile_picture_id && $user->profilePicture) {
                Storage::disk('public')->delete($user->profilePicture->filename);
                $user->profilePicture->delete();
            }

            $file = $request->file('avatar');
            $safeName = uniqid().'_'.preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $path = $file->storeAs('uploads/avatars', $safeName, 'public');

            $uploadedFile = Files::create([
                'filename' => $path,
                'alt' => 'Avatar utilisateur',
                'type' => 'image',
                'filesize' => $file->getSize()
            ]);

            $user->profile_picture_id = $uploadedFile->id;
        }
        
        $user->update([
            'civility'    => $validated['civilite'] ?? null,
            'first_name'  => $validated['firstname'] ?? null,
            'last_name'   => $validated['lastname'] ?? null,
            'birth_date'  => $validated['birth_date'] ?? null,
            'birth_place' => $validated['birth_place'] ?? null,
            'nationality' => $validated['nationality'] ?? null,
            'phone_number'=> $validated['phone_number'] ?? null
        ]);

        // 2. Mise à jour ou création de la relation investisseur
        $investisseur = $user->investisseur()->updateOrCreate(
            [], // conditions pour updateOrCreate
            [
                'profession'             => $validated['profession'] ?? null,
                'ppe'                    => $validated['ppe'] ?? false,
                'adresse_representant'   => $validated['adresse'] ?? null,
                'fonction'               => $validated['fonction'] ?? null,
            ]
        );

        // 3. Rafraîchir la relation pour que $user->investisseur soit à jour
        $user->load('investisseur');

        $field = 'piece_identite';
        if ($request->hasFile($field)) {
            $files = $request->file($field);

            // Vérifier si un document du même type existe déjà
            $existingDoc = UserDocument::where('investisseur_id', $investisseur->id)
                ->where('type', $field)
                ->with('file')
                ->first();

            if ($existingDoc) {
                // Supprimer physiquement l'ancien fichier
                if ($existingDoc->file && Storage::disk('public')->exists($existingDoc->file->filename)) {
                    Storage::disk('public')->delete($existingDoc->file->filename);
                }

                // Supprimer en base
                $existingDoc->file()->delete();
                $existingDoc->delete();
            }

            foreach ((array) $files as $key => $file) {
                if ($file->isValid()) {
                    // Mapping du type MIME vers l'ENUM
                    $typeMime = explode('/', $file->getClientMimeType())[0];
                    switch ($typeMime) {
                        case 'image':
                            $type = 'image';
                            break;
                        case 'video':
                            $type = 'video';
                            break;
                        case 'application':
                        case 'text':
                        default:
                            $type = 'document';
                            break;
                    }

                    // Sauvegarder le fichier
                    $storedFile = $file->store('uploads/justificatifs', 'public');

                    // Enregistrer dans Files
                    $fileEntity = Files::create([
                        'filename' => $storedFile,
                        'alt' => 'Pièce d\'identité '. $key+1 .' du représentant',
                        'type' => $type,
                        'filesize' => $file->getSize()
                    ]);

                    // Enregistrer dans UserDocument
                    UserDocument::create([
                        'user_id' => $user->id,
                        'investisseur_id' => $investisseur->id,
                        'file_id' => $fileEntity->id,
                        'type' => $field,
                        'status' => 'À approuver',
                    ]);
                }
            }
        }

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

    public function updateLegalEntity(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'denomination_sociale' => 'required|string',
            'forme_juridique' => 'required|string',
            'numero_immatriculation' => [
                'required',
                'string',
                Rule::unique('legal_entities', 'numero_immatriculation')
                    ->ignore(optional($user->investisseur)->id), 
            ],
            'creation_date' => 'required|date',
            'beneficiaires' => 'required|array|min:1',
            'beneficiaires.*.nom' => 'nullable|string',
            'beneficiaires.*.prenoms' => 'nullable|string',
            'beneficiaires.*.birth_date' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'beneficiaires.*.birth_place' => 'nullable|string|max:255',
            'beneficiaires.*.nationalite' => 'nullable|string',
            'beneficiaires.*.adresse' => 'nullable|string',
            'beneficiaires.*.piece_identite.*' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ], [
            // Messages personnalisés
            'numero_immatriculation.unique' => 'Ce numéro d’immatriculation est déjà réservé.',
        ]);

        $investisseur = $user->investisseur()->updateOrCreate([], [
            'denomination_sociale' => $validated['denomination_sociale'],
            'forme_juridique' => $validated['forme_juridique'],
            'numero_immatriculation' => $validated['numero_immatriculation'],
            'creation_date' => $validated['creation_date'],
        ]);
        
        // Récupérer les IDs envoyés
        $submittedIds = collect($validated['beneficiaires'])->pluck('id')->filter()->toArray();

        // Supprimer les bénéficiaires qui n'ont pas été renvoyés
        $investisseur->beneficiaires()
            ->whereNotIn('id', $submittedIds)
            ->each(function ($benef) {
                // Supprimer ses documents et fichiers associés
                foreach ($benef->documents as $doc) {
                    if ($doc->file && Storage::disk('public')->exists($doc->file->filename)) {
                        Storage::disk('public')->delete($doc->file->filename);
                    }
                    $doc->file()->delete();
                    $doc->delete();
                }
                $benef->delete();
            });

        // 1. Gérer les fichiers pour chaque bénéficiaire
        foreach ($validated['beneficiaires'] as $index => $benefData) {
            $beneficiaire = $investisseur->beneficiaires()->updateOrCreate(
                ['id' => $request->input("beneficiaires.$index.id")],
                $benefData
            );
            
            // Upload/remplacement de la pièce d'identité
            if ($request->hasFile("beneficiaires.$index.piece_identite")) {
                // Récupérer l’ancien document (si existant)
                $oldDoc = $beneficiaire->documents()->where('type', 'piece_identite')->first();

                if ($oldDoc) {
                    // Supprimer physiquement l’ancien fichier
                    if ($oldDoc->file && Storage::disk('public')->exists($oldDoc->file->filename)) {
                        Storage::disk('public')->delete($oldDoc->file->filename);
                    }

                    // Supprimer en base
                    $oldDoc->file()->delete();
                    $oldDoc->delete();
                }

                foreach ($request->file("beneficiaires.$index.piece_identite") as $key => $file) {
                    if (!$file->isValid()) continue;

                    $storedFile = $file->store('uploads/beneficiaires', 'public');

                    $fileEntity = Files::create([
                        'filename' => $storedFile,
                        'alt' => 'Pièce d\'identité '. $key+1 .' du bénéficiaire',
                        'type' => explode('/', $file->getClientMimeType())[0],
                        'filesize' => $file->getSize(),
                    ]);

                    UserDocument::create([
                        'user_id' => $user->id,
                        'beneficiaire_id' => $beneficiaire->id,
                        'file_id' => $fileEntity->id,
                        'type' => 'piece_identite',
                        'status' => 'À approuver',
                    ]);
                }
            }
        }

        // 2. Upload avatar si présent
        if ($request->hasFile('avatar')) {
            // Supprimer l'ancien avatar
            if ($user->profile_picture_id && $user->profilePicture) {
                Storage::disk('public')->delete($user->profilePicture->filename);
                $user->profilePicture->delete();
            }

            $file = $request->file('avatar');
            $safeName = uniqid().'_'.preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $path = $file->storeAs('uploads/avatars', $safeName, 'public');

            $uploadedFile = Files::create([
                'filename' => $path,
                'alt' => 'Avatar utilisateur',
                'type' => 'image',
                'filesize' => $file->getSize()
            ]);

            $user->profile_picture_id = $uploadedFile->id;
        }
        $user->save();

        return back()->with('success', 'Profil mis à jour avec succès.');
    }
}