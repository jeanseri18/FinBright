<?php

namespace App\Http\Controllers\Emprunteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanRequest;
use Illuminate\Support\Facades\Auth;

class LoanRequestController extends Controller
{
    /**
     * Affiche le formulaire de simulation.
     */
    public function create()
    {
        return view('back.emprunteur.loan_requests.create');
    }

    /**
     * Calcule la simulation d’un prêt (sans créer la demande pour le moment).
     */
    public function simulate(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:student,mini',
            'amount' => 'required|numeric|min:500',
            'duration' => 'required|integer|min:6|max:60',
            'deferred' => 'nullable|boolean',
            'deferred_months' => 'nullable|integer|min:0|max:36',
        ]);

        // Exemple simple de calcul mensuel
        $rate = 0.08; // 8% annuel
        $monthlyRate = $rate / 12;
        $duration = $validated['duration'];
        $amount = $validated['amount'];

        $mensualite = ($amount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$duration));
        $total = $mensualite * $duration;

        return view('back.emprunteur.loan_requests.simulation_result', [
            'amount' => $amount,
            'duration' => $duration,
            'mensualite' => round($mensualite, 2),
            'total' => round($total, 2),
            'inputs' => $validated
        ]);
    }
}