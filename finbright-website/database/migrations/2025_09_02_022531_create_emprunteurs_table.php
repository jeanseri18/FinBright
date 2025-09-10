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
        Schema::create('emprunteurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('diploma')->nullable();
            $table->string('specialization')->nullable();
            $table->string('current_study_year')->nullable(); // Ex: L1, M2, etc.
            $table->integer('remaining_years')->nullable(); // Années restantes d'études
            $table->string('graduation_date')->nullable(); // Date de diplomation si connu
            $table->timestamps();

            // Clés étrangères (ajoutées après les autres champs pour une meilleure lisibilité)
            $table->foreignId('etablissement_id')->nullable()->constrained('etablissements')->onDelete('set null');
            $table->foreignId('risk_level_id')->nullable()->constrained('risk_levels')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprunteurs');
    }
};
