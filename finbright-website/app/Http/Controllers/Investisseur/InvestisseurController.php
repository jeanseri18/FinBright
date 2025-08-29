<?php

namespace App\Http\Controllers\Investisseur;

use App\Models\Files;
use App\Models\UserDocument;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class InvestisseurController extends Controller
{
    public function profil()
    {
        Session::put('menu_actif', 'mon_compte');
        if (Auth::user()->type_of_lender == "Personne physique") {
            $documentsAttendus = [
                'piece_identite' => "Pièce d'identité en cours de validité (CNI recto-verso ou Passeport, Titre de séjour pour les étrangers)",
                'justificatif_domicile' => "Justificatif de domicile de moins de 3 mois",
                'justificatif_activite_pro' => "Justificatif d'activité professionnelle",
                'declaration_origine_fonds' => "Déclaration sur l'origine des fonds",
            ];
        }
        else {
            $documentsAttendus = [
                'extrait_immatriculation' => "Extrait d'immatriculation datant de moins de 3 mois (type Kbis en France)",
                'statuts_a_jour_signes' => "Statuts à jour et signés",
            ];
        }
        $userDocuments = Auth::user()->documents->keyBy('type');
        $documentsGroupByType = Auth::user()->documents->groupBy('type');

        return view('back.investisseur.mon-profil', compact([
            'documentsAttendus',
            'userDocuments',
            'documentsGroupByType',
        ]));
    }

    public function updateLegalEntity(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'denomination_sociale' => 'required|string',
            'forme_juridique' => 'required|string',
            'numero_immatriculation' => 'required|string',
            'dirigeants' => 'required|array|min:1',
            'dirigeants.*.civilite' => 'nullable|string',
            'dirigeants.*.nom' => 'required|string',
            'dirigeants.*.prenoms' => 'nullable|string',
            'dirigeants.*.poste' => 'nullable|string',
            'dirigeants.*.pourcentage_actions' => 'nullable|numeric',
            'dirigeants.*.telephone' => 'nullable|string',
            'dirigeants.*.email' => 'nullable|email',
        ]);

        $user = Auth::user();
        $user->legalEntity()->updateOrCreate([], [
            'denomination_sociale' => $validated['denomination_sociale'],
            'forme_juridique' => $validated['forme_juridique'],
            'numero_immatriculation' => $validated['numero_immatriculation'],
            'dirigeants' => $validated['dirigeants'],
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
        $user->save();

        return back()->with('success', 'Profil mis à jour avec succès.');
    }
}