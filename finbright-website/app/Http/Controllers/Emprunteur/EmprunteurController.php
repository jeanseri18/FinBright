<?php

namespace App\Http\Controllers\Emprunteur;

use App\Models\Files;
use App\Models\LoanRequest;
use App\Services\RiskEvaluator;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ParametresController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class EmprunteurController extends Controller
{
    public function index()
    {
        Session::put('menu_actif', 'dashboard');
        // Session::forget('menu_actif');
        // $loanRequests = LoanRequest::where('emprunteur_id', Auth::id())->latest()->get();
        $emprunteur = Auth::user()->emprunteur;
        $loan = $emprunteur ? LoanRequest::where('emprunteur_id', $emprunteur->id)->latest()->first() : null;
        
        return view('back.emprunteur.dashboard', compact('loan'));
    }

    /**
     * Affiche le formulaire de simulation.
     */
    public function profil(ParametresController $parametres)
    {
        Session::put('menu_actif', 'mon_profil');
        $etablissements = Etablissement::all();
        $documentsAttendus = [
            'piece_identite' => "Pièce d'identité en cours de validité (CNI recto-verso ou Passeport, Titre de séjour pour les étrangers)",
            'justificatif_domicile' => "Justificatif de domicile de moins de 3 mois",
            'certificat_scolarite' => "Certificat de scolarité de l'année en cours ou Lettre d'admission définitive",
            'releve_bancaire' => "Relevé d'Identité Bancaire (RIB) à votre nom",
        ];
        $emprunteur = Auth::user()->emprunteur;
        $countries = $parametres->getContries();
        $userDocuments = Auth::user()->documents->keyBy('type');
        $documentsGroupByType = Auth::user()->documents->groupBy('type');

        return view('back.emprunteur.mon-profil', compact([
            'etablissements',
            'documentsAttendus',
            'userDocuments',
            'documentsGroupByType',
            'countries'
        ]));
    }

    public function updateProfil(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'civilite' => 'required|in:M.,Mme.,Mx.',
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'birth_date' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'birth_place' => 'required|string|max:255',
            'nationality' => 'required|string|max:100',
            'phone_number' => [
                'required',
                'string',
                Rule::unique('users', 'phone_number')
                    ->ignore(optional($user->investisseur)->id), 
            ],
        ], [
            // Messages personnalisés
            'phone_number.unique' => 'Ce numéro de téléphone est déjà utilisé.',
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

        // 2. Mise à jour des champs
        $user->fill([
            'civility' => $validated['civilite'] ?? null,
            'first_name' => $validated['firstname'] ?? null,
            'last_name' => $validated['lastname'] ?? null,
            'birth_date' => $validated['birth_date'] ?? null,
            'birth_place' => $validated['birth_place'] ?? null,
            'nationality' => $validated['nationality'] ?? null,
            'phone_number' => $validated['phone_number'] ?? null,
        ]);

        $user->save();

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

    public function updateCursus(Request $request, RiskEvaluator $evaluator)
    {
        $validated = $request->validate([
            'etablissement' => 'required|exists:etablissements,id',
            'diplome' => 'required|string|max:100',
            'filiere' => 'required|string|max:100',
            'annee_etude' => 'required|string|max:50',
            'nombre_annees_restantes' => 'nullable|integer',
            'date_diplome_prevue' => ['nullable', 'date', 'after_or_equal:' . now()->format('Y-m-d')],
        ]);

        /** @var User $user */
        $user = Auth::user();

        DB::transaction(function () use ($user, $validated, $evaluator) {
            // 1) updateOrCreate sur la relation hasOne (emprunteurs.user_id doit exister)
            $emprunteur = $user->emprunteur()->updateOrCreate(
                ['user_id' => $user->id], // condition pour retrouver l'enregistrement
                [
                    'etablissement_id'    => $validated['etablissement'],
                    'diploma'             => $validated['diplome'],
                    'specialization'      => $validated['filiere'],
                    'current_study_year'  => $validated['annee_etude'] ?? null,
                    'remaining_years'     => isset($validated['nombre_annees_restantes']) ? (int)$validated['nombre_annees_restantes'] : null,
                    'graduation_date'     => $validated['date_diplome_prevue'] ?? null,
                    // 'is_profile_completed'=> true,
                ]
            );

            // 2) Évaluer le niveau de risque (adapter selon ce que attend ton RiskEvaluator)
            // Si le service attend un User, appelle $evaluator->evaluate($user) après avoir refresh le user.
            // Ici j'essaie avec $emprunteur (si RiskEvaluator lit les mêmes champs).
            $riskLevel = $evaluator->evaluate($emprunteur);

            $emprunteur->risk_level_id = $riskLevel ? $riskLevel->id : null;
            $emprunteur->save();
        });

        return back()->with('success', 'Cursus académique mis à jour.');
    }

    public function filieresParDiplome(string $diplome)
    {
        $map = [
            'master_grande_ecole' => ['Finance d\'entreprise', 'Management Stratégique'],
            'diplome_ingenieur' => ['Sécurité des systèmes d\'information', 'Cyberdéfense', 'Énergies durables', 'Ingénierie nucléaire', 'Systèmes aérospatiaux'],
            'master_specialise' => ['Finance de marché', 'Banque d\'investissement', 'Conseil en organisation', 'Ingénierie Financière', 'Business Analytics', 'Data Science for Business', 'Stratégie IA', 'Machine Learning', 'Systèmes aérospatiaux'],
            'master_universitaire' => ['Finance d\'entreprise', 'Finance de marché', 'Management Stratégique', 'Data Science for Business', 'Stratégie IA', 'Machine Learning'],
            'mba' => ['Finance d’entreprise', 'Management Stratégique', 'Conseil en organisation', 'Business Analytics', 'International Business', 'Entrepreneurship & Innovation', 'Marketing Management', 'Human Resources Management', 'Supply Chain Management'],
            'autre' => ['Autre spécialisation'],
        ];

        return response()->json($map[$diplome] ?? []);
    }
}