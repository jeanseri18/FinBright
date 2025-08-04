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
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }

        Schema::table('payments', function (Blueprint $table) {
            // Exemple : si vous vouliez ajouter une nouvelle colonne à une table existante
            if (!Schema::hasColumn('payments', 'additional_column')) {
                $table->string('additional_column')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
