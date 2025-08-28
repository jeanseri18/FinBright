<?php

namespace App\Http\Controllers\Investisseur;

use App\Http\Controllers\Controller;
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
        $loanRequests = LoanRequest::where('status', 'validated')->with('user')->get();
        return view('back.investisseur.dashboard', compact('loanRequests'));
    }

    public function decouvrir(Request $request)
    {
        Session::put('menu_actif', 'decouvrir');
        $query = LoanRequest::where('status', 'En attente d\'approbation')->with('user');

        // Exemple de filtres
        if ($request->filled('min_amount')) {
            $query->where('amount', '>=', $request->min_amount);
        }
        if ($request->filled('max_amount')) {
            $query->where('amount', '<=', $request->max_amount);
        }
        if ($request->filled('risk_level')) {
            $query->whereHas('user.riskLevel', function($q) use ($request) {
                $q->where('profile', $request->risk_level);
            });
        }

        $loanRequests = $query->latest()->paginate(10);
        return view('back.investisseur.projets.discover', compact('loanRequests'));
    }

    public function json(LoanRequest $loanRequest)
    {
        $loanRequest->load('user.riskLevel');

        // $totalInvesti = $loanRequest->investments->sum('amount');
        $remaining_amount = max(0, $loanRequest->simulation_result['amount'] - 0);//$totalInvesti);

        return response()->json([
            'id' => $loanRequest->id,
            'object' => $loanRequest->object,
            'amount' => $loanRequest->simulation_result['amount'],
            'remaining_amount' => $remaining_amount,
            'duration' => $loanRequest->simulation_result['duration'],
            'description' => $loanRequest->description,
            'risk_rate' => $loanRequest->user->riskLevel->yield ?? null,
            'risk_level' => $loanRequest->user->riskLevel->profile ?? null,
            'user_name' => $loanRequest->user->first_name . ' ' . $loanRequest->user->last_name,
            'avatar' => $loanRequest->user->profilePicture->filename ?? null,
        ]);
    }

    public function show(LoanRequest $loanRequest)
    {
        $loanRequest->load('user.riskLevel', 'investments.user');
        return view('back.investisseur.projets.show', compact('loanRequest'));
    }

    public function investir(Request $request, LoanRequest $loanRequest)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:100',
        ]);

        Investment::create([
            'user_id' => Auth::id(),
            'loan_request_id' => $loanRequest->id,
            'amount' => $validated['amount'],
        ]);

        return redirect()->back()->with('success', 'Investissement réalisé avec succès.');
    }
}
