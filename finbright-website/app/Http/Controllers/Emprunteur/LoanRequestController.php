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
        $validated = [
            'type' => $request->input('type'),
            'amount' => $request->input('amount'),
            'duration' => $request->input('duration'),
            'deferred' => $request->input('deferred'),
            'deferred_months' => $request->input('deferred_months'),
        ];

        // Exemple simple de calcul mensuel
        $duration = $validated['duration'];
        $amount = $validated['amount'];
        $simulation_result = $this->calculMensuel($duration, $amount);

        return response()->json([
            'success' => true,
            'amount' => $amount,
            'duration' => $duration,
            'mensualite' => $simulation_result['mensualite'],
            'total' => $simulation_result['total'],
            'inputs' => $validated
        ]);
    }

    // Fonction simple de calcul mensuel
    private function calculMensuel($duration, $amount) {
        $rate = 0.08; // 8% annuel
        $monthlyRate = $rate / 12;

        $mensualite = ($amount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$duration));
        $total = $mensualite * $duration;

        return [
            'mensualite' => round($mensualite, 2),
            'total' => round($total, 2),
        ];
    }

    public function soumettreDemande(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:student,mini',
            'amount' => 'required|numeric|min:500',
            'duration' => 'required|integer|min:6|max:60',
            'deferred' => 'nullable|boolean',
            'deferred_months' => 'nullable|integer|min:0|max:36',
        ]);
        $simulation_result = $this->calculMensuel($validated['duration'], $validated['amount']);

        LoanRequest::create([
            'user_id' => Auth::id(),
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'duration' => $validated['duration'],
            'simulation_result' => $simulation_result,
            // 'deferred' => $validated['deferred'],
            // 'deferred_months' => $validated['deferred_months'],
            'status' => 'En attente'
        ]);

        return redirect()->route('emprunteur.mes-demandes');
    }

    public function demandes(Request $request)
    {
        $loanRequests = LoanRequest::where('user_id', Auth::id())->latest()->get();
        return view('back.emprunteur.demandes.liste', compact('loanRequests'));
    }
    
    public function annuler(LoanRequest $loan)
    {
        if ($loan->user_id !== Auth::id() || $loan->status !== 'En attente') {
            abort(403, 'Action non autorisée.');
        }

        $loan->status = 'annulée';
        $loan->save();

        return redirect()->route('emprunteur.mes-demandes')->with('success', 'Demande annulée avec succès.');
    }

    public function edit(LoanRequest $loan)
    {
        if ($loan->user_id !== Auth::id() || $loan->status !== 'En attente') {
            abort(403, 'Modification interdite.');
        }

        return view('back.emprunteur.edit', compact('loan'));
    }

    public function update(Request $request, LoanRequest $loan)
    {
        if ($loan->user_id !== Auth::id() || $loan->status !== 'En attente') {
            abort(403);
        }

        $validated = $request->validate([
            'amount' => 'required|numeric|min:500',
            'duration' => 'required|integer|min:6|max:60',
            'deferred' => 'nullable|boolean',
            'deferred_months' => 'nullable|integer|min:0|max:36',
        ]);

        $loan->update($validated);

        return redirect()->route('emprunteur.mes-demandes')->with('success', 'Demande modifiée.');
    }
}