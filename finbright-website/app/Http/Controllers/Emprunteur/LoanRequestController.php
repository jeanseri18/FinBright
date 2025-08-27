<?php

namespace App\Http\Controllers\Emprunteur;

use App\Models\Files;
use App\Models\LoanRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode; // Importation de la classe RoundingMode

class LoanRequestController extends Controller
{
    /**
     * Calcule la simulation d’un prêt (sans créer la demande pour le moment).
     */
    public function simulate(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:500|max:100000',
            'taux_interet' => 'required|numeric|min:3',
            'taux_assurance' => 'required|numeric|max:1',
            'duration' => 'required|integer|min:6|max:60',
            'deferred' => 'nullable|boolean',
            'deferred_months' => 'nullable|integer|min:0|max:36',
            'date_mois' => 'required|string',
            'date_annee' => 'required|integer|min:2025|max:2100',
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
        $date_debut = Carbon::createFromDate($annee, $mois, 1);

        // Conversion des valeurs
        $pret = $validated['amount'];
        $dureepret = $validated['duration'];
        $dureediffere = isset($validated['deferred']) && $validated['deferred'] ? ($validated['deferred_months'] ?? 0) : 0;
        
        $tauxinteret = $validated['taux_interet'] / 100; // taux d’intérêt annuel en %
        $tauxassurance = $validated['taux_assurance'] / 100; // taux assurance annuel en %

        $resultat = $this->calculateLoanMetrics($pret, $dureepret, $tauxinteret, $tauxassurance, $dureediffere);

        Session::put('simulate_result', [
            'amount' => $pret,
            'duration' => $dureepret,
            'mensualite' => $resultat['mensualite_amortissement'],
            'interets' => $resultat['total_interets'],
            'assurances' => $resultat['total_assurances'],
            'total' => $resultat['total_cout_credit'],
            'deferred_months' => $validated['deferred_months'],
            'date_debut' => $date_debut->format('Y-m-d'),
            // 'inputs' => $validated
        ]);

        return response()->json([
            'success' => true,
            'amount' => $pret,
            'duration' => $dureepret,
            'mensualite' => $resultat['mensualite_amortissement'],
            'interets' => $resultat['total_interets'],
            'assurances' => $resultat['total_assurances'],
            'total' => $resultat['total_cout_credit'],
            'date_debut' => $date_debut->format('Y-m-d'),
            'inputs' => $validated
        ]);
    }

    /**
     * Calcule les métriques clés d'un prêt amortissable avec une période de différé partiel.
     * Tous les calculs monétaires sont effectués avec l'extension BCMath pour une haute précision.
     *
     * @param float $pret Le capital initial emprunté.
     * @param int $dureepret La durée totale du prêt en mois.
     * @param float $tauxinteret Le taux d'intérêt nominal annuel (ex: 0.06).
     * @param float $tauxassurance Le taux d'assurance annuel (ex: 0.005).
     * @param int $dureediffere La durée de la période de différé partiel en mois.
     *
     * @return array Un tableau associatif contenant les métriques calculées.
     */
    function calculateLoanMetrics(
        float $pret, 
        int $dureepret, 
        float $tauxinteret, 
        float $tauxassurance, 
        int $dureediffere
    ): array {
        // Définir la précision de BCMath (par exemple, 10 décimales)
        bcscale(10);

        // --- 1. Initialisation des variables et conversions ---
        $C = $pret; // Capital emprunté
        $N = $dureepret; // Durée totale en mois
        $d = $dureediffere; // Période de différé en mois
        $n = $N - $d; // Période d'amortissement en mois
        
        // Conversion des taux annuels en taux mensuels
        $i = bcdiv($tauxinteret, 12);
        $iass = bcdiv($tauxassurance, 12);

        // --- 2. Calculs pour la Période de Différé (mois 1 à d) ---
        // Les intérêts mensuels sont constants et calculés sur le capital initial
        $interetMensuelDiffere = bcmul($C, $i);

        // La prime d'assurance mensuelle est également constante
        $assuranceMensuelle = bcmul($C, $iass);

        // La mensualité pendant le différé est la somme des intérêts et de l'assurance
        $mensualiteDiffere = bcadd($interetMensuelDiffere, $assuranceMensuelle);

        // --- 3. Calculs pour la Période d'Amortissement (mois d+1 à N) ---
        // Calcul de la mensualité hors assurance pour la phase d'amortissement
        // Utilisation de la formule standard des annuités constantes sur la durée restante (n)
        $C_bc = (string)$C;
        $i_bc = (string)$i;
        $n_bc = (string)$n;

        $numerator = bcmul($C_bc, $i_bc);
        $denominator = bcsub(1, bcpow(bcadd(1, $i_bc), bcmul(-1, $n_bc)));
        $mensualiteAmortissementHa = bcdiv($numerator, $denominator);

        // Calcul de la mensualité totale (avec assurance) pour la phase d'amortissement
        $mensualiteAmortissement = bcadd($mensualiteAmortissementHa, $assuranceMensuelle);

        // --- 4. Calcul des coûts totaux ---
        // Coût total des intérêts : somme des intérêts pendant le différé et l'amortissement
        $totalInteretsDiffere = bcmul($interetMensuelDiffere, $d);
        
        // Pour les intérêts de la période d'amortissement, nous devons itérer
        // car le capital restant dû diminue chaque mois
        $totalInteretsAmortissement = '0';
        $capitalRestantDu = $C;
        for ($k = 1; $k <= $n; $k++) {
            $interetsDuMois = bcmul($capitalRestantDu, $i);
            $totalInteretsAmortissement = bcadd($totalInteretsAmortissement, $interetsDuMois);
            
            $capitalRembourse = bcsub($mensualiteAmortissementHa, $interetsDuMois);
            $capitalRestantDu = bcsub($capitalRestantDu, $capitalRembourse);
        }
        
        $totalInterets = bcadd($totalInteretsDiffere, $totalInteretsAmortissement);

        // Coût total de l'assurance : prime mensuelle constante sur toute la durée
        $totalAssurances = bcmul($assuranceMensuelle, $N);

        // Coût total du crédit : différence entre le montant total remboursé et le capital emprunté
        $totalPaiements = bcadd(bcmul($mensualiteDiffere, $d), bcmul($mensualiteAmortissement, $n));
        $totalCoutCredit = bcsub($totalPaiements, $C);

        // Alternatively, total cost can be the sum of total interest and total insurance [cite: 48]
        $totalCoutCredit += bcadd($totalInterets, $totalAssurances);

        // --- 5. Retour des résultats arrondis à 2 décimales ---
        return [
            'mensualite_differe' => round(floatval($mensualiteDiffere), 2),
            'mensualite_amortissement' => round(floatval($mensualiteAmortissement), 2),
            'total_interets' => round(floatval($totalInterets), 2),
            'total_assurances' => round(floatval($totalAssurances), 2),
            'total_cout_credit' => round(floatval($totalCoutCredit), 2),
        ];
    }

    /**
     * Génère un tableau d'amortissement complet pour un prêt avec différé partiel.
     * Utilise BCMath pour des calculs financiers précis.
     *
     * @param float $pret Le capital initial emprunté.
     * @param int $dureepret La durée totale du prêt en mois.
     * @param float $tauxinteret Le taux d'intérêt nominal annuel (ex: 0.06).
     * @param float $tauxassurance Le taux d'assurance annuel (ex: 0.005).
     * @param int $dureediffere La durée de la période de différé partiel en mois.
     *
     * @return array Le tableau d'amortissement complet.
     */
    function genererTableauAmortissement(
        float $pret,
        int $dureepret,
        float $tauxinteret,
        float $tauxassurance,
        int $dureediffere
    ): array {
        // Définir la précision de BCMath (ex: 10 décimales)
        bcscale(10);

        // Initialisation et conversions
        $C = (string)$pret;
        $N = (int)$dureepret;
        $d = (int)$dureediffere;
        $n = $N - $d;
        $i = bcdiv((string)$tauxinteret, '12');
        $iass = bcdiv((string)$tauxassurance, '12');

        $tableau = [];
        $capitalRestantDu = $C;
        $cumulInterets = '0';
        
        // Calcul des mensualités pour les deux périodes
        $interetMensuelDiffere = bcmul($C, $i);
        $assuranceMensuelle = bcmul($C, $iass);
        $mensualiteHaDiffere = $interetMensuelDiffere;
        $mensualiteAaDiffere = bcadd($mensualiteHaDiffere, $assuranceMensuelle);
        
        $denominateur = bcsub('1', bcpow(bcadd('1', $i), bcmul('-1', (string)$n)));
        $mensualiteHaAmort = bcdiv(bcmul($C, $i), $denominateur);
        $mensualiteAaAmort = bcadd($mensualiteHaAmort, $assuranceMensuelle);

        // Boucle de génération du tableau
        for ($k = 1; $k <= $N; $k++) {
            $interetsMois = '0';
            $capitalRembourseMois = '0';
            $mensualiteHaMois = '0';
            $mensualiteAaMois = '0';

            if ($k <= $d) {
                // Période de différé
                $interetsMois = $interetMensuelDiffere;
                $capitalRembourseMois = '0';
                $mensualiteHaMois = $mensualiteHaDiffere;
                $mensualiteAaMois = $mensualiteAaDiffere;
            } else {
                // Période d'amortissement
                // Le calcul des intérêts se base sur le Capital Restant Dû du mois précédent
                $interetsMois = bcmul($capitalRestantDu, $i);
                $capitalRembourseMois = bcsub($mensualiteHaAmort, $interetsMois);
                $mensualiteHaMois = $mensualiteHaAmort;
                $mensualiteAaMois = $mensualiteAaAmort;
            }
            
            // Mise à jour des valeurs pour l'itération suivante
            $capitalRestantDu = bcsub($capitalRestantDu, $capitalRembourseMois);
            $cumulInterets = bcadd($cumulInterets, $interetsMois);

            // Correction pour le dernier mois
            if ($k === $N) {
                // Ajustement pour s'assurer que le CRD est exactement 0
                $capitalRembourseMois = bcadd($capitalRembourseMois, $capitalRestantDu);
                $capitalRestantDu = '0';
            }

            // Ajouter la ligne au tableau
            $tableau[] = [
                'echeance' => $k,
                'date' => (new \DateTime())->modify("+$k months")->format('M-Y'),
                'mensualite_aa' => round(floatval($mensualiteAaMois), 2),
                'mensualite_ha' => round(floatval($mensualiteHaMois), 2),
                'interet' => round(floatval($interetsMois), 2),
                'assurance' => round(floatval($assuranceMensuelle), 2),
                'capital_rembourse' => round(floatval($capitalRembourseMois), 2),
                'capital_restant_du' => round(floatval($capitalRestantDu), 2),
                'cumul_interets' => round(floatval($cumulInterets), 2),
            ];
        }

        return $tableau;
    }

    public function createDemande(Request $request)
    {
        Session::put('menu_actif', 'mes_demandes');
        $validated = $request->validate([
            'revenus_actuels' => 'required|numeric',
            'revenus_futurs' => 'required|numeric',
            'garant' => 'nullable|numeric',
            'dettes' => 'required|numeric',
            'charges' => 'required|numeric',
            'taux_endettement' => 'required|numeric'
        ]);
        Session::put('debt_result', [
            'revenus_actuels' => $validated['revenus_actuels'],
            'revenus_futurs' => $validated['revenus_futurs'],
            'garant' => $validated['garant'],
            'dettes' => $validated['dettes'],
            'charges' => $validated['charges'],
            'taux_endettement' => $validated['taux_endettement']
        ]);

        $loan = null;
        return view('back.emprunteur.demandes.create', compact('loan'));
    }

    public function saveDemande(Request $request, $loanId = null)
    {
        $validated = $request->validate([
            'object' => 'required|string',
            'duree_campagne' => 'nullable|integer',
            'description' => 'required|string',
            'explication' => 'required|string',
            'presentation' => 'required|string',
            'justify_rent.*' => 'nullable|file|max:4096', // 4 Mo max par fichier
            'justify_debt.*' => 'nullable|file|max:4096',
        ]);

        $loan = DB::transaction(function () use ($request, $validated, $loanId) {
            if ($loanId) {
                $loan = LoanRequest::findOrFail($loanId);

                if (isset($validated['duree_campagne'])) {
                    // Vérifications durée
                    if ($loan->duree_campagne_modifications >= 2) {
                        throw ValidationException::withMessages(['duree_campagne' => 'La durée ne peut plus être modifiée.']);
                    }
                    // Calcul de la date de fin de la campagne actuelle et de la durée totale de campagne
                    $fin_campagne = $loan->created_at->copy()->addMonths($loan->duree_campagne);
                    // Vérifier qu’il reste au moins 7 jours avant la fin de la campagne
                    if (Carbon::now()->diffInDays($fin_campagne) < 7) {
                        throw ValidationException::withMessages([
                            'duree_campagne' => 'La durée ne peut plus être modifiée car la campagne arrive à son terme dans moins de 7 jours.'
                        ]);
                    }
                    // Date de fin maximale de la campagne (date de création + 9 mois)
                    $maxEndDate = $loan->created_at->copy()->addMonths(9);
                    // Nouvelle durée renseignée, castée en int
                    $newDuration = (int) $validated['duree_campagne'];
                    // Date de fin si on applique la nouvelle durée renseignée
                    $newEndDate = $loan->created_at->copy()->addMonths($newDuration);
                    // Vérifier que la nouvelle fin ne dépasse pas la limite
                    if ($newEndDate > $maxEndDate) {
                        throw ValidationException::withMessages([
                            'duree_campagne' => 'La durée totale de la campagne ne peut pas dépasser 9 mois depuis la création.'
                        ]);
                    }
                }

                $loan->update(array_merge($validated, [
                    'duree_campagne_modifications' => $loan->duree_campagne_modifications + 1
                ]));
            } else {
                $loan = LoanRequest::create([
                    'user_id' => Auth::id(),
                    'object' => $validated['object'],
                    'duree_campagne' => $validated['duree_campagne'],
                    'description' => $validated['description'],
                    'explication' => $validated['explication'],
                    'presentation' => $validated['presentation'],
                    'simulation_result' => session('simulate_result'),
                    'debt_params' => session('debt_result'),
                    'debt_ratio' => session('debt_result.taux_endettement'),
                    'status' => 'En attente d\'approbation',
                    'duree_campagne_modifications' => 0,
                ]);
            }

            // Gestion des fichiers justificatifs
            foreach (['justify_rent' => 'Justificatif de revenus', 'justify_debt' => 'Justificatif de dettes'] as $field => $alt) {
                if ($request->hasFile($field)) {
                    foreach ($request->file($field) as $file) {
                        if ($file->isValid()) {
                            $path = $file->store("uploads/$field", 'public');
                            Files::create([
                                'loan_request_id' => $loan->id,
                                'filename' => $path,
                                'alt' => $alt,
                                'type' => $field,
                                'filesize' => $file->getSize(),
                            ]);
                        }
                    }
                }
            }

            // Nettoyer les sessions
            session()->forget(['simulate_result', 'debt_result']);
            
            return $loan; // retourner l'instance
        });

        return redirect()
            ->route('emprunteur.loan-requests.details', $loan->id)
            ->with('success', 'Demande enregistrée avec succès.');
    }

    public function demandes(Request $request)
    {
        Session::put('menu_actif', 'mes_demandes');
        $loanRequests = LoanRequest::where('user_id', Auth::id())->latest()->get();
        return view('back.emprunteur.demandes.liste', compact('loanRequests'));
    }
    
    public function details(LoanRequest $loan)
    {
        Session::put('menu_actif', 'mes_demandes');
        // if ($loan->user_id !== Auth::id() || $loan->status !== 'En attente d\'approbation') {
        //     abort(403, 'Modification interdite.');
        // }

        // Appel de la fonction pour générer le tableau
        if ($loan) {
            $tableauAmortissement = $this->genererTableauAmortissement(
                $loan->simulation_result['amount'],
                $loan->simulation_result['duration'],
                $loan->simulation_result['interets'],
                $loan->simulation_result['assurances'],
                $loan->simulation_result['deferred_months']
            );
        }

        return view('back.emprunteur.demandes.details', compact('loan', 'tableauAmortissement'));
    }

    public function edit(LoanRequest $loan)
    {
        Session::put('menu_actif', 'mes_demandes');
        if ($loan->user_id !== Auth::id() || $loan->status !== 'En attente d\'approbation') {
            abort(403, 'Modification interdite.');
        }

        return view('back.emprunteur.demandes.create', compact('loan'));
    }

    public function annuler(LoanRequest $loan)
    {
        if ($loan->user_id !== Auth::id() || $loan->status !== 'En attente d\'approbation') {
            abort(403, 'Action non autorisée.');
        }

        $loan->status = 'Annulée';
        $loan->save();

        return redirect()->route('emprunteur.mes-demandes')->with('success', 'Demande annulée avec succès.');
    }
}