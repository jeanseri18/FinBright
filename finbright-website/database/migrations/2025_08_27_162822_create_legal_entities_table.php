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
        Schema::create('legal_entities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->string('denomination_sociale');
            $table->string('forme_juridique');
            $table->string('numero_immatriculation')->unique();
            $table->json('dirigeants')->nullable(); // pour stocker un tableau d'objets JSON
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('legal_entities');
    }
};
