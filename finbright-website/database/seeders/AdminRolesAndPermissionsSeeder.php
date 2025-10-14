<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminRolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Nettoyage
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // === Permissions de base ===
        $permissions = [
            'voir tableau de bord',
            'gérer utilisateurs',
            'gérer investisseurs',
            'gérer emprunteurs',
            'gérer prêts',
            'gérer paramètres',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'admin']
            );
        }

        // === Rôles ===
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'admin']);
        $gestionnaire = Role::firstOrCreate(['name' => 'Gestionnaire', 'guard_name' => 'admin']);
        $moderateur = Role::firstOrCreate(['name' => 'Modérateur', 'guard_name' => 'admin']);

        // Assigner des permissions aux rôles
        $superAdmin->givePermissionTo(Permission::all()); // tous les droits
        $gestionnaire->givePermissionTo(['voir tableau de bord', 'gérer prêts', 'gérer investisseurs']);
        $moderateur->givePermissionTo(['voir tableau de bord']);

        // === Exemple : assigner un rôle à un Admin existant ===
        $admin = Admin::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'fullname' => 'Admin test',
                'status' => 'Actif',
                'password' => Hash::make('adminpass'),
            ]
        );
        $admin->assignRole('Super Admin');
    }
}