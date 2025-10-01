<?php

namespace App\Http\Controllers\Investisseur;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\YouSignService;
use App\Http\Controllers\Emprunteur\LoanRequestController;
use Illuminate\Http\Request;
use App\Models\LoanRequest;
use App\Models\Investment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InvestmentController extends Controller
{
    public function index()
    {
        Session::put('menu_actif', 'dashboard');
        $loanRequests = LoanRequest::where('status', 'validated')->with('emprunteur')->get();
        return view('back.investisseur.dashboard', compact('loanRequests'));
    }

    public function decouvrir(Request $request)
    {
        Session::put('menu_actif', 'decouvrir');
        $investisseur = Auth::user()->investisseur;

        $query = LoanRequest::where('status', 'En cours de financement')
            ->with('emprunteur')
            ->whereDoesntHave('investments', function ($q) use ($investisseur) {
                $q->where('investisseur_id', $investisseur->id); // exclut les prêts déjà investis
            });

        // Exemple de filtres
        if ($request->filled('min_amount')) {
            $query->whereRaw("CAST(JSON_UNQUOTE(JSON_EXTRACT(simulation_result, '$.total')) AS DECIMAL(10,2)) >= ?", [$request->min_amount]);
        }

        if ($request->filled('max_amount')) {
            $query->whereRaw("CAST(JSON_UNQUOTE(JSON_EXTRACT(simulation_result, '$.total')) AS DECIMAL(10,2)) <= ?", [$request->max_amount]);
        }

        if ($request->filled('risk_level') && $request->risk_level != "Tout") {
            $query->whereHas('emprunteur.riskLevel', function($q) use ($request) {
                $q->where('profile', $request->risk_level);
            });
        }

        $loanRequests = $query->latest()->paginate(10);
        return view('back.investisseur.projets.discover', compact('loanRequests'));
    }

    public function myProjects(Request $request)
    {
        Session::put('menu_actif', 'investissements');

        $investments = Auth::user()->investisseur->investments;
        return view('back.investisseur.projets.my-projects', compact('investments'));
    }

    public function details(LoanRequest $loan, LoanRequestController $loanController)
    {
        // Appel de la fonction pour générer le tableau
        if ($loan) {
            $tableauAmortissement = $loanController->genererTableauAmortissement(
                $loan->simulation_result['amount'] ?? 0,
                $loan->simulation_result['duration'] ?? 0,
                $loan->simulation_result['interets'] ?? 0,
                $loan->simulation_result['assurances'] ?? 0,
                $loan->simulation_result['deferred_months'] ?? 0
            );
        }

        return view('back.investisseur.projets.details', compact('loan', 'tableauAmortissement'));
    }

    public function json(LoanRequest $loanRequest)
    {
        $loanRequest->load('emprunteur.riskLevel');

        // $totalInvesti = $loanRequest->investments->sum('amount');
        $remaining_amount = max(0, $loanRequest->simulation_result['amount'] - 0);//$totalInvesti);
        $emprunteur = $loanRequest->emprunteur;

        return response()->json([
            'id' => $loanRequest->id,
            'object' => $loanRequest->object,
            'amount' => $loanRequest->simulation_result['amount'],
            'remaining_amount' => $remaining_amount,
            'duration' => $loanRequest->simulation_result['duration'],
            'description' => $loanRequest->description,
            'risk_rate' => $emprunteur->riskLevel->yield ?? null,
            'risk_level' => $emprunteur->riskLevel->profile ?? null,
            'user_name' => $emprunteur->user->first_name . ' ' . $emprunteur->user->last_name,
            'avatar' => $emprunteur->user->profilePicture->filename ?? null,
        ]);
    }

    public function show(LoanRequest $loanRequest)
    {
        $loanRequest->load('emprunteur.riskLevel', 'investments.user');
        return view('back.investisseur.projets.show', compact('loanRequest'));
    }

    /**
     * Gère l'investissement dans une requête de prêt et lance la signature électronique.
     */
    public function investir(Request $request, LoanRequest $loanRequest, YouSignService $yousignService)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:100',
            'type_investissement' => 'required|string',
        ]);

        $investisseur = Auth::user()->investisseur;

        // Vérifier si l'investissement existe déjà
        $existing = Investment::where('investisseur_id', $investisseur->id)
            ->where('loan_request_id', $loanRequest->id)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Vous avez déjà investi dans ce projet.');
        }

        // 1. Création de l'investissement
        $investment = Investment::create([
            'investisseur_id' => $investisseur->id,
            'loan_request_id' => $loanRequest->id,
            'amount' => $validated['amount'],
            'type_investment' => $validated['type_investissement'],
            'status' => 'En attente de signature', 
        ]);

        // 2. Préparation des données pour YouSign
        // **Simulation de l'Emprunteur et du chemin du PDF**
        // En réalité, $emprunteur doit être récupéré via la relation $loanRequest->user
        $emprunteur = $loanRequest->emprunteur;
        // dd($emprunteur);
        
        // Simuler un chemin vers un document PDF unique pour ce prêt (à adapter)
        $pdfPath = storage_path("app/public/contrats/pret_{$loanRequest->id}_{$investment->id}.pdf");
        
        // --- NOTE IMPORTANTE : Générez le PDF ici si ce n'est pas déjà fait ---
        // Ex: $this->generateContractPDF($loanRequest, $investment, $pdfPath);

        if (!file_exists($pdfPath)) {
             return redirect()->back()->with('error', 'Erreur : Le contrat de prêt n\'a pas été généré.');
        }

        // 3. Définir les signataires
        $signerInvestisseur = [
            'first_name' => $investisseur->prenom,
            'last_name' => $investisseur->nom,
            'email' => $investisseur->email,
            // Assurez-vous que le champ 'phone_number' existe sur le modèle User/Investisseur
            'phone_number' => $investisseur->phone_number ?? '+33600000000', 
            'page' => 5, 
            'x' => 400, // Position de la signature Investisseur
            'y' => 150,
        ];

        $signerEmprunteur = [
            'first_name' => $emprunteur->prenom,
            'last_name' => $emprunteur->nom,
            'email' => $emprunteur->email,
            'phone_number' => $emprunteur->phone_number ?? '+33600000000', 
            'page' => 5, 
            'x' => 100, // Position de la signature Emprunteur
            'y' => 150,
        ];
        
        // 4. Lancer la procédure de signature
        $response = $yousignService->createAndActivateSignatureRequest($pdfPath, $signerInvestisseur, $signerEmprunteur);

        if ($response) {
            // Mise à jour du statut pour suivre la procédure de signature
            $investment->update(['status' => 'Signature en cours']);
            
            // Envoyer une notification à l'Investisseur (et à l'Emprunteur)
            // L'email d'invitation à signer est envoyé directement par YouSign.
            // Nous notifions l'utilisateur pour une alerte interne dans l'application.
            $this->notifyUsers($investisseur, $emprunteur, $response);

            return redirect()->back()->with('success', 'Votre investissement a été enregistré. La procédure de signature électronique a été lancée et vous recevrez un email de YouSign.');
        }

        // En cas d'échec de l'API YouSign, marquer l'investissement comme nécessitant une action
        $investment->update(['status' => 'Échec signature']);
        return redirect()->back()->with('error', 'Erreur critique lors du lancement de la signature électronique. Veuillez contacter un administrateur.');
    }

    /**
     * Méthode simulée pour envoyer les notifications internes.
     * @param User $investisseur
     * @param User $emprunteur
     * @param array $response
     */
    protected function notifyUsers(User $investisseur, User $emprunteur, array $response)
    {
        // Dans un cas réel, vous injecteriez NotificationService ici.
        // $notificationService->notify(...); 

        $investorSigner = collect($response['signers'])->firstWhere('info.email', $investisseur->email);
        $investorSignUrl = $investorSigner['links']['redirect'] ?? '#';

        $emprunteurSigner = collect($response['signers'])->firstWhere('info.email', $emprunteur->email);
        $emprunteurSignUrl = $emprunteurSigner['links']['redirect'] ?? '#';

        // Notification Investisseur
        // Simule l'envoi d'une notification avec un bouton d'accès direct à la signature (lien fourni par YouSign)
        \App\Models\Notification::create([
            'user_id' => $investisseur->id,
            'type' => 'yousign_invitation',
            'message' => 'Le **Contrat de Prêt** est prêt à être signé. Cliquez ci-dessous pour commencer !',
            'data' => ['buttons' => "<a href='{$investorSignUrl}' target='_blank' class='btn btn-primary'>Signer le contrat</a>"],
        ]);
        
        // Notification Emprunteur (pour être complet)
         \App\Models\Notification::create([
            'user_id' => $emprunteur->id,
            'type' => 'yousign_invitation',
            'message' => 'L\'investissement a été validé ! Votre **Contrat de Prêt** est prêt à être signé. Cliquez ci-dessous pour commencer !',
            'data' => ['buttons' => "<a href='{$emprunteurSignUrl}' target='_blank' class='btn btn-primary'>Signer le contrat</a>"],
        ]);
    }
}
