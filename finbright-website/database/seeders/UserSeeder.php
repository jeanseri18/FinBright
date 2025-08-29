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
        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'civility' => 'M.',
                'last_name' => 'Admin',
                'first_name' => 'System',
                'password' => Hash::make('adminpass'),
            ]
        );
        $admin->assignRole('admin');

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

        // Investisseur
        $investisseur = User::firstOrCreate(
            ['email' => 'investisseur@test.com'],
            [
                'civility' => 'Mme',
                'last_name' => 'Smith',
                'first_name' => 'Investisseur',
                'password' => Hash::make('investpass'),
            ]
        );
        $investisseur->assignRole('investisseur');
    }
}