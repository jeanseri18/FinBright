<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etablissement;

class EtablissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etablissements = [
            [
                'nom' => 'Université Paris 1 Panthéon-Sorbonne',
                'ville' => 'Paris',
                'pays' => 'France',
            ],
            [
                'nom' => 'Université de Lyon',
                'ville' => 'Lyon',
                'pays' => 'France',
            ],
            [
                'nom' => 'Université de Bordeaux',
                'ville' => 'Bordeaux',
                'pays' => 'France',
            ],
        ];

        foreach ($etablissements as $etablissement) {
            Etablissement::firstOrCreate(
                ['nom' => $etablissement['nom']],
                $etablissement
            );
        }
    }
}