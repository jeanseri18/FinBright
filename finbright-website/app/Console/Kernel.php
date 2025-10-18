<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        // Exécute la commande chaque heure — la commande elle-même lit la fréquence définie
        $schedule->command('trash:purge')->hourly();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}