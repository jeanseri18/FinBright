<?php

namespace App\Services;

class InvestorRiskService
{
    protected array $riskCountries = [
        'Afrique du Sud', 'Algérie', 'Angola', 'Bulgarie', 'Burkina Faso', 
        'Cameroun', 'Côte d\'Ivoire', 'Croatie', 'Haïti', 'Kenya', 'Laos', 'Liban', 
        'Mali', 'Monaco', 'Mozambique', 'Namibie', 'Népal', 'Nigeria', 'République démocratique du Congo', 
        'Soudan du Sud', 'Syrie', 'Tanzanie', 'Venezuela', 'Vietnam', 'Yémen', 'Corée du Nord', 'Iran', 'Myanmar'
    ];

    public function evaluate(array $data): array
    {
        $score = 0;

        // CLIENT
        if (($data['is_legal_entity'] ?? '') === 'Personne morale') {
            $score += 10;
        }

        if (!empty($data['is_ppe']) && $data['is_ppe']) {
            return [
                'score' => 30,
                'level' => 'Élevé',
                'reason' => 'Personne Politiquement Exposée'
            ];
        }

        if (!empty($data['is_complex_structure']) && (int)$data['is_complex_structure'] > 5) {
            $score += 15;
        }

        // GÉOGRAPHIE
        if (!empty($data['resides_risk_country']) &&
            in_array($data['resides_risk_country'], $this->riskCountries, true)) {
            $score += 20;
        }

        if (!empty($data['funds_from_risk_country']) &&
            in_array($data['funds_from_risk_country'], $this->riskCountries, true)) {
            $score += 20;
        }

        // TRANSACTION
        // if (!empty($data['amount']) && $data['amount'] > ($data['seuil_interne'] ?? 10000)) {
        //     $score += 5;
        // }

        // if (!empty($data['unjustified_early_repayment']) && $data['unjustified_early_repayment'] === true) {
        //     $score += 10;
        // }

        if (!empty($data['channel_remote_only']) && $data['channel_remote_only'] === true) {
            $score += 5;
        }

        // ÉVALUATION FINALE
        $level = match (true) {
            $score >= 25 => 'Élevé',
            $score >= 11 => 'Standard',
            default => 'Faible'
        };

        return [
            'score' => $score,
            'level' => $level,
            'reason' => null
        ];
    }
}