<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiskLevel;

class RiskLevelSeeder extends Seeder
{
    public function run(): void
    {
        RiskLevel::insert([
            [
                'profile' => 'A',
                'characteristics' => json_encode([
                    'years' => ['Dernière année'],
                    'diplomas' => ['Master Grande École', 'Diplôme d\'Ingénieur'],
                    'specializations' => [
                        'Finance d\'entreprise', 'Finance de marché', 'Banque d\'investissement',
                        'Ingénierie Financière', 'Conseil en organisation',
                        'Data Science', 'IA', 'Cybersécurité',
                        'Énergies durables', 'Ingénierie nucléaire', 'Systèmes aérospatiaux'
                    ]
                ]),
                'score_range' => '85-100',
                'yield' => 5.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profile' => 'B',
                'characteristics' => json_encode([
                    'years' => ['Dernière année'],
                    'diplomas' => ['Master 2', 'Ingénieur 3'],
                    'specializations' => ['Marketing', 'Achat', 'RH']
                ]),
                'score_range' => '65-84',
                'yield' => 5.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profile' => 'C',
                'characteristics' => json_encode([
                    'years' => ['Première année', 'Deuxième année'],
                    'diplomas' => ['Master 1', 'Ingénieur 1', 'Ingénieur 2']
                ]),
                'score_range' => '50-64',
                'yield' => 6.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}