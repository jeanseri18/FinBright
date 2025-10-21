<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutoValidateLoans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loans:auto-validate';

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
        // Règle : valider automatiquement les LoanRequest qui remplissent certains critères
        $candidates = \App\Models\LoanRequest::where('status','En attente de confirmation')
            // ->whereRaw("JSON_EXTRACT(debt_params, '$.taux_endettement') >= ?", [33]) // ex: condition
            ->limit(50)->get();

        foreach ($candidates as $loan) {
            $loan->status = 'En cours de financement'; // ou 'Validé'
            $loan->save();
            // Optionnel: notifier l'emprunteur / log
        }
        $this->info('Auto validation done: '.$candidates->count());
    }
}
