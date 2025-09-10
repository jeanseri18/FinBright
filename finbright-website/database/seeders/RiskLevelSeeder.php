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
                    'years' => ['Deuxième année', 'Troisième année', 'Dernière année'], // Master 2 = 2e année / Ingénieur 3 = 3e année / MBA dernière année
                    'diplomas' => [
                        'master:2',    // Master Grande École 2e année
                        'ingenieur:3',      // Ingénieur 3e année
                        'mba:1',                    // MBA une année
                        'mba:dernier'               // MBA dernière année
                    ],
                    'specializations' => [
                        'Finance d\'entreprise', 'Finance de marché', 'Banque d\'investissement', 'Ingénierie Financière', 'Management Stratégique', 'Conseil en organisation', 'Business Analytics', 'Data Science for Business', 'Stratégie IA', 'Machine Learning', 'Sécurité des systèmes d\'information', 'Cyberdéfense', 'Énergies durables', 'Ingénierie nucléaire', 'Systèmes aérospatiaux'
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
                    'years' => ['Deuxième année', 'Troisième année', 'Dernière année'], 
                    'diplomas' => [
                        'master:2',
                        'ingenieur:3',
                        'mba:1',
                        'mba:dernier'
                    ],
                    'specializations' => [
                        'Marketing Management', 'Human Resources Management', 'Business Analytics'
                    ]
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
                    'diplomas' => [
                        'master1',
                        'ingenieur:1',
                        'ingenieur:2',
                        'mba:premiere'              // MBA première année
                    ],
                    'specializations' => ['*'] // * = peu importe la filière
                ]),
                'score_range' => '50-64',
                'yield' => 6.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}