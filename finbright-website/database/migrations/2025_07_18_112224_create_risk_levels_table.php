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
        Schema::create('risk_levels', function (Blueprint $table) {
            $table->id();
            $table->string('profile'); // Exemple: A, B, C
            $table->json('characteristics'); // Ex: années, diplômes, spécialisations
            $table->string('score_range'); // Exemple: 85-100
            $table->decimal('yield', 5, 2); // Exemple: 5.00
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('risk_levels');
    }
};
