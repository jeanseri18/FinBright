<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PurgeSystemLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:purge-logs';

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
        // Exemple : Model SystemLog avec softDeletes
        $threshold = now()->subMonths(3); // ou lire config
        $count = \App\Models\SecurityLog::where('created_at', '<', $threshold)->count();
        if ($count) {
            \App\Models\SecurityLog::where('created_at', '<', $threshold)->chunkById(200, function($rows) {
                foreach ($rows as $r) { $r->delete(); } // ou forceDelete si déjà in trash logic
            });
        }
        $this->info('Purge system logs done.');
    }
}
