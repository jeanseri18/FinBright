<?php

namespace App\Http\Controllers\Emprunteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanRequest;
use Illuminate\Support\Facades\Auth;

class LoanRequestController extends Controller
{
    /**
     * Calcule la simulation d’un prêt (sans créer la demande pour le moment).
     */
    public function simulate(Request $request)
    {
        $validated = $request->validate([
            // 'type' => 'required|in:student,mini',
            'amount' => 'required|numeric|min:500',
            'taux_interet' => 'required|numeric|min:3',
            'taux_assurance' => 'required|numeric|min:1',
            'duration' => 'required|integer|min:6|max:60',
            'deferred' => 'nullable|boolean',
            'deferred_months' => 'nullable|integer|min:0|max:36',
            'date_mois' => 'required|string',
            'date_annee' => 'required|integer|min:2020|max:2100',
        ]);

        $mois_numerique = [
            'Janvier' => 1,
            'Février' => 2,
            'Mars' => 3,
            'Avril' => 4,
            'Mai' => 5,
            'Juin' => 6,
            'Juillet' => 7,
            'Aout' => 8,
            'Septembre' => 9,
            'Octobre' => 10,
            'Novembre' => 11,
            'Décembre' => 12,
        ];

        $mois = $mois_numerique[$validated['date_mois']];
        $annee = $validated['date_annee'];
        $date_debut = \Carbon\Carbon::createFromDate($annee, $mois, 1);

        // Conversion des valeurs
        $pret = $validated['amount'];
        $dureepret = $validated['duration'];
        $typediffere = isset($validated['deferred']) && $validated['deferred'] ? 2 : 1;
        $dureediffere = $validated['deferred_months'] ?? 0;

        // Données fixes pour commencer
        $tauxinteret = $validated['taux_interet'] ?? 8; // taux d’intérêt annuel en %
        $tauxassurance = $validated['taux_assurance'] ?? 1; // taux assurance annuel en %

        $resultat = $this->simulerPret($pret, $dureepret, $tauxinteret, $tauxassurance, $typediffere, $dureediffere);

        return response()->json([
            'success' => true,
            'amount' => $pret,
            'duration' => $dureepret,
            'mensualite' => $resultat['mensualite'],
            'interets' => $resultat['interets'],
            'assurances' => $resultat['assurances'],
            'total' => $resultat['total'],
            'date_debut' => $date_debut->format('Y-m-d'),
            'inputs' => $validated
        ]);
    }

    // Fonction simple de calcul mensuel
    private function simulerPret($pret, $dureepret, $tauxinteret, $tauxassurance, $typediffere, $dureediffere = 0)
    {
        $mensualite = 0;
        $interets = 0;
        $assurances = 0;

        $mensualite_interet = $pret * ($tauxinteret / 100) / 12;
        $assurance_mensuelle = $pret * ($tauxassurance / 100) / 12;

        if ($typediffere === 1) {
            $mensualite = ($pret * ($tauxinteret / 100) / 12) / (1 - pow(1 + ($tauxinteret / 100) / 12, -$dureepret));
            $nbMensualites = $dureepret;
        } elseif ($typediffere === 2) {
            $mensualite = ($pret * ($tauxinteret / 100) / 12) / (1 - pow(1 + ($tauxinteret / 100) / 12, -($dureepret - $dureediffere)));
            $nbMensualites = $dureepret - $dureediffere;
            $interets += $mensualite_interet * $dureediffere;
        } elseif ($typediffere === 3) {
            $mensualite = ($pret * ($tauxinteret / 100) / 12) / (1 - pow(1 + ($tauxinteret / 100) / 12, -($dureepret - $dureediffere)));
            $nbMensualites = $dureepret - $dureediffere;
            $interets += $mensualite_interet * $dureediffere;
        }

        $interets += ($mensualite - $mensualite_interet) * $nbMensualites;
        $assurances = $assurance_mensuelle * $dureepret;
        $coutTotal = $interets + $assurances;

        return [
            'mensualite' => round($mensualite, 2),
            'interets' => round($interets, 2),
            'assurances' => round($assurances, 2),
            'total' => round($coutTotal, 2)
        ];
    }

    // public function soumettreDemande(Request $request)
    // {
    //     $validated = $request->validate([
    //         'type' => 'required|in:student,mini',
    //         'amount' => 'required|numeric|min:500',
    //         'duration' => 'required|integer|min:6|max:60',
    //         'deferred' => 'nullable|boolean',
    //         'deferred_months' => 'nullable|integer|min:0|max:36',
    //     ]);
    //     $simulation_result = $this->calculMensuel($validated['duration'], $validated['amount']);

    //     LoanRequest::create([
    //         'user_id' => Auth::id(),
    //         'type' => $validated['type'],
    //         'amount' => $validated['amount'],
    //         'duration' => $validated['duration'],
    //         'simulation_result' => $simulation_result,
    //         // 'deferred' => $validated['deferred'],
    //         // 'deferred_months' => $validated['deferred_months'],
    //         'status' => 'En attente'
    //     ]);

    //     return redirect()->route('emprunteur.mes-demandes');
    // }

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

        return view('back.emprunteur.demandes.edit', compact('loan'));
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