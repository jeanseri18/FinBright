<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Emprunteur
        $emprunteur = User::firstOrCreate(
            ['email' => 'emprunteur@test.com'],
            [
                'civility' => 'M.',
                'last_name' => 'Doe',
                'first_name' => 'Emprunteur',
                'password' => Hash::make('empruntpass'),
            ]
        );
        $emprunteur->assignRole('emprunteur');

        // Investisseur PP
        $investisseurPP = User::firstOrCreate(
            ['email' => 'investisseur.physique@test.com'],
            [
                'civility' => 'Mme',
                'last_name' => 'Smith',
                'first_name' => 'Investisseur',
                'password' => Hash::make('investpass'),
            ]
        );
        $investisseurPP->investisseur()->create([
            'type_of_lender' => 'Personne physique',
        ]);
        $investisseurPP->assignRole('investisseur');

        // Investisseur PM
        $investisseurPM = User::firstOrCreate(
            ['email' => 'investisseur.morale@test.com'],
            [
                'password' => Hash::make('investpass'),
            ]
        );
        $investisseurPM->investisseur()->create([
            'denomination_sociale' => 'Mon entreprise',
            'type_of_lender' => 'Personne morale',
        ]);
        $investisseurPM->assignRole('investisseur');
    }
}