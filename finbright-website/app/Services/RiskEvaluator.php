<?php

namespace App\Services;

use App\Models\RiskLevel;

class RiskEvaluator
{
    public function evaluate($user): ?RiskLevel
    {
        $riskLevels = RiskLevel::all();

        // Normalisation du profil utilisateur
        $userDiploma = strtolower($user->diploma ?? '');
        $userYear = strtolower($user->current_study_year ?? '');
        $userSpecialization = strtolower($user->specialization ?? '');

        // Exemple : "master:2", "ingenieur:3", "mba:1"
        $userDiplomaKey = $this->mapDiplomaYear($userDiploma, $userYear);

        foreach ($riskLevels as $level) {
            $char = $level->characteristics;

            // Diplôme + année combinés (ex: "master:2")
            $matchDiploma = empty($char['diplomas']) 
                || in_array($userDiplomaKey, array_map('strtolower', $char['diplomas']))
                || in_array($userDiploma, array_map('strtolower', $char['diplomas']));

            // Vérifie les années (si le seeder ne précise que l'année seule)
            // $matchYear = empty($char['years']) 
            //     || in_array($userYear, array_map('strtolower', $char['years']));

            // Vérifie la spécialisation
            $matchSpecialization = empty($char['specializations']) 
                || in_array('*', $char['specializations'])
                || in_array($userSpecialization, array_map('strtolower', $char['specializations']));

            if ($matchDiploma && $matchSpecialization) {
                return $level;
            }
        }

        return $riskLevels[2];
    }

    /**
     * Crée une clé normalisée "diplome:année"
     */
    private function mapDiplomaYear(string $diploma, string $year): string
    {
        $mapYears = [
            'première année' => '1',
            'deuxième année' => '2',
            'troisième année' => '3',
            'dernière année' => '3', // alias si besoin
        ];

        $base = '';
        if (str_contains($diploma, 'master')) {
            $base = 'master';
        } elseif (str_contains($diploma, 'ingenieur')) {
            $base = 'ingenieur';
        } elseif ($diploma === 'mba') {
            $base = 'mba';
        }

        return $base && isset($mapYears[$year]) ? $base . ':' . $mapYears[$year] : $diploma;
    }
}