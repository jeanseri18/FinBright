<?php

namespace App\Services;

use App\Models\RiskLevel;
use App\Models\User;

class RiskEvaluator
{
    public function evaluate($user): ?RiskLevel
    {
        $riskLevels = RiskLevel::all();

        foreach ($riskLevels as $level) {
            $char = $level->characteristics;

            // $yearMatch = false;
            // if (isset($char['years'])) {
            //     if ($user->current_study_year == 5 && in_array('Dernière année', $char['years'])) $yearMatch = true;
            //     elseif ($user->current_study_year == 4 && in_array('Deuxième année', $char['years'])) $yearMatch = true;
            //     elseif ($user->current_study_year <= 3 && in_array('Première année', $char['years'])) $yearMatch = true;
            // }

            if (
                (!empty($char['years']) && in_array($user->current_study_year, $char['years'])) &&
                (!empty($char['diplomas']) && in_array($user->diploma, $char['diplomas'])) &&
                (!empty($char['specializations']) && in_array($user->specialization, $char['specializations']))
            ) {
                return $level;
            }
        }

        return null;
    }
}