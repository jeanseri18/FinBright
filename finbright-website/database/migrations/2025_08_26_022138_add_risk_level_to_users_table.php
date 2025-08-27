<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'risk_level_id')) {
                $table->foreignId('risk_level_id')
                      ->nullable()
                      ->constrained('risk_levels')
                      ->nullOnDelete()
                      ->after('etablissement_id');
            }
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('risk_level_id');
        });
    }
};
