<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('loan_requests', 'interets')) $table->float('interets')->nullable();
            if (!Schema::hasColumn('loan_requests', 'assurances')) $table->float('assurances')->nullable();
            if (!Schema::hasColumn('loan_requests', 'revenus_actuels')) $table->float('revenus_actuels')->nullable();
            if (!Schema::hasColumn('loan_requests', 'revenus_futurs')) $table->float('revenus_futurs')->nullable();
            if (!Schema::hasColumn('loan_requests', 'garant')) $table->float('garant')->nullable();
            if (!Schema::hasColumn('loan_requests', 'dettes')) $table->float('dettes')->nullable();
            if (!Schema::hasColumn('loan_requests', 'taux_endettement')) $table->float('taux_endettement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            //
        });
    }
};
