<?php

namespace App\Http\Controllers\Investisseur;

use App\Http\Controllers\Controller;
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

        $query = LoanRequest::where('status', 'En attente d\'approbation')
            ->with('emprunteur')
            ->whereDoesntHave('investments', function ($q) use ($investisseur) {
                $q->where('investisseur_id', $investisseur->id); // exclut les prêts déjà investis
            });

        // Exemple de filtres
        if ($request->filled('min_amount')) {
            $query->where('simulation_result->amount', '>=', $request->min_amount);
        }
        if ($request->filled('max_amount')) {
            $query->where('simulation_result->amount', '<=', $request->max_amount);
        }
        if ($request->filled('risk_level')) {
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

    public function investir(Request $request, LoanRequest $loanRequest)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:100',
            'type_investissement' => 'required|string',
        ]);

        Investment::create([
            'investisseur_id' => Auth::user()->investisseur->id,
            'loan_request_id' => $loanRequest->id,
            'amount' => $validated['amount'],
            'type_investment' => $validated['type_investissement'],
            'status' => 'À approuver', // valeur par défaut
        ]);

        return redirect()->back()->with('success', 'Investissement réalisé avec succès.');
    }
}
