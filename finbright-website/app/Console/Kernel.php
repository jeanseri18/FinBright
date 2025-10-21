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

        // purge system logs -> quotidienne
        $schedule->command('system:purge-logs')->dailyAt('03:00');

        // auto-validation loans -> toutes les heures
        $schedule->command('loans:auto-validate')->hourly();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}