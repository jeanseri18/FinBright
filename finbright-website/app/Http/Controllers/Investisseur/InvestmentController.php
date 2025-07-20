<?php

namespace App\Http\Controllers\Investisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanRequest;
use App\Models\Investment;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    public function index()
    {
        $loanRequests = LoanRequest::where('status', 'validated')->with('user')->get();
        return view('back.investisseur.dashboard', compact('loanRequests'));
    }

    public function decouvrir()
    {
        $loanRequests = LoanRequest::where('status', 'En attente')->with('user')->get();
        return view('back.investisseur.projets.discover', compact('loanRequests'));
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
