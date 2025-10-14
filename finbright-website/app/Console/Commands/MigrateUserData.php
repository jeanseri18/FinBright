<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateUserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-user-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = \App\Models\User::all();

        foreach ($users as $user) {
            if ($user->hasRole('investisseur')) {
                $user->investisseur()->create([
                    'profession' => $user->profession,
                    'type_of_lender' => $user->type_of_lender,
                    'denomination_sociale' => $user->denomination_sociale,
                ]);
            }

            if ($user->hasRole('emprunteur')) {
                $user->emprunteur()->create([
                    'diploma' => $user->diploma,
                    'specialization' => $user->specialization,
                    'current_study_year' => $user->current_study_year,
                    'remaining_years' => $user->remaining_years,
                    'graduation_date' => $user->graduation_date,
                    'etablissement_id' => $user->etablissement_id,
                    'risk_level_id' => $user->risk_level_id,
                ]);
            }

            // if ($user->hasRole('admin')) {
            //     $user->admin()->create([
            //         'permissions' => $user->permissions,
            //     ]);
            // }
        }

        $this->info('Migration des données terminée avec succès.');
    }
}
