<?php

namespace App\Http\Controllers\Emprunteur;

use App\Models\LoanRequest;
use App\Services\RiskEvaluator;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class EmprunteurController extends Controller
{
    public function index()
    {
        Session::put('menu_actif', 'dashboard');
        // Session::forget('menu_actif');
        // $loanRequests = LoanRequest::where('user_id', Auth::id())->latest()->get();
        $loan = LoanRequest::where('user_id', Auth::id())->latest()->first();
        return view('back.emprunteur.dashboard', compact('loan'));
    }

    /**
     * Affiche le formulaire de simulation.
     */
    public function profil()
    {
        Session::put('menu_actif', 'mon_profil');
        $etablissements = Etablissement::all();
        $documentsAttendus = [
            'piece_identite' => "Pièce d'identité en cours de validité (CNI recto-verso ou Passeport, Titre de séjour pour les étrangers)",
            'justificatif_domicile' => "Justificatif de domicile de moins de 3 mois",
            'certificat_scolarite' => "Certificat de scolarité de l'année en cours ou Lettre d'admission définitive",
            'releve_bancaire' => "Relevé d'Identité Bancaire (RIB) à votre nom",
        ];
        $userDocuments = Auth::user()->documents->keyBy('type');
        $documentsGroupByType = Auth::user()->documents->groupBy('type');

        return view('back.emprunteur.mon-profil', compact([
            'etablissements',
            'documentsAttendus',
            'userDocuments',
            'documentsGroupByType',
        ]));
    }

    public function updateCursus(Request $request, RiskEvaluator $evaluator)
    {
        $request->validate([
            'etablissement' => 'required|exists:etablissements,id',
            'diplome' => 'required|string|max:100',
            'filiere' => 'required|string|max:100',
            'annee_etude' => 'nullable|string|max:50',
            'nombre_annees_restantes' => 'nullable|string|max:50',
            'date_diplome_prevue' => 'nullable|date',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->etablissement_id = $request->etablissement;
        $user->diploma = $request->diplome;
        $user->specialization = $request->filiere;
        $user->current_study_year = $request->annee_etude;
        $user->remaining_years = (int) $request->nombre_annees_restantes;
        $user->graduation_date = $request->date_diplome_prevue;
        $user->is_profile_completed = true;

        $riskLevel = $evaluator->evaluate($user);
        $user->risk_level_id = $riskLevel->id;

        $user->save();
        

        return back()->with('success', 'Cursus académique mis à jour.');
    }

    public function filieresParDiplome(string $diplome)
    {
        $map = [
            'Master grande école' => ['Finance d’entreprise', 'Management Stratégique', 'Management', 'Audit'],
            'Diplôme d\'ingénieur' => ['Sécurité des systèmes d’information', 'Cyberdéfense', 'Énergies durables', 'Ingénierie nucléaire', 'Systèmes aérospatiaux', 'IA', 'Robotique', 'Cybersécurité'],
            'Master spécialisé' => ['Finance de marché', 'Banque d’investissement', 'Conseil en organisation', 'Ingénierie Financière', 'Business Analytics', 'Data Science for Business', 'Stratégie IA, Machine Learning', 'Systèmes aérospatiaux', 'Cyberdéfense', 'Énergies durables', 'Ingénierie nucléaire', 'Droit des Affaires', 'Fiscalité'],
            'Master universitaire' => ['Finance d’entreprise', 'Finance de marché', 'Management Stratégique', 'Data Science for Business', 'Stratégie IA, Machine Learning'],
            'Autre' => ['Autre spécialisation'],
        ];

        return response()->json($map[$diplome] ?? []);
    }
}