<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            // ➕ Ajout des nouveaux champs
            $table->json('debt_params')->nullable()->after('simulation_result');
            $table->float('debt_ratio')->nullable()->after('debt_params');
            $table->string('object')->nullable()->after('debt_ratio');
            $table->longText('description')->nullable()->after('object');

            // ➖ Suppression des anciens champs
            $table->dropColumn([
                'interets',
                'assurances',
                'revenus_actuels',
                'revenus_futurs',
                'garant',
                'dettes',
                'taux_endettement',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            // 🔄 Restauration des anciens champs
            $table->float('interets')->nullable();
            $table->float('assurances')->nullable();
            $table->float('revenus_actuels')->nullable();
            $table->float('revenus_futurs')->nullable();
            $table->float('garant')->nullable();
            $table->float('dettes')->nullable();
            $table->float('taux_endettement')->nullable();

            // 🔄 Suppression des nouveaux champs
            $table->dropColumn(['debt_params', 'debt_ratio', 'object', 'description']);
        });
    }
};