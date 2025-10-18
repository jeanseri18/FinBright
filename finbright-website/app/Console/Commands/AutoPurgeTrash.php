<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class AutoPurgeTrash extends Command
{
    protected $signature = 'trash:purge';
    protected $description = 'Purge automatique des éléments en corbeille en fonction de la configuration';

    public function handle()
    {
        $auto = Setting::get('trash.auto_delete', true);
        if (! $auto) {
            $this->info('Auto purge disabled.');
            return 0;
        }

        $freq = Setting::get('trash.frequency', 'weekly');

        $threshold = match ($freq) {
            'daily' => Carbon::now()->subDay(),
            'weekly' => Carbon::now()->subWeek(),
            'monthly' => Carbon::now()->subMonth(),
            'yearly' => Carbon::now()->subYear(),
            default => Carbon::now()->subWeek(),
        };

        // Liste des modèles à purger — ajoute/retire selon besoin
        $models = [
            \App\Models\Etablissement::class,
            \App\Models\Admin::class,
            \App\Models\LoanRequest::class,
            // etc...
        ];

        foreach ($models as $model) {
            $count = $model::onlyTrashed()->where('deleted_at', '<', $threshold)->count();
            if ($count) {
                $this->info("Purging {$count} records of {$model} ...");
                $model::onlyTrashed()->where('deleted_at', '<', $threshold)->chunkById(200, function($rows) use ($model) {
                    foreach ($rows as $r) {
                        $r->forceDelete();
                    }
                });
            }
        }

        $this->info('Purge done.');
        return 0;
    }
}