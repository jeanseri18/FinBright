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
        Schema::create('loan_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Ajoutez ici les colonnes initiales, si elles ne sont pas déjà ajoutées par votre migration d'ajout de colonnes.
            // Par exemple, si 'amount' est supposé être dans la migration de création, mettez-le ici.
            // Si 'amount' et les autres champs sont ajoutés par la migration que vous avez montrée,
            // alors cette migration de création peut être plus simple.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_requests');
    }
};
