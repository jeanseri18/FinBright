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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investisseur_id')->constrained()->cascadeOnDelete();
            $table->foreignId('loan_request_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount', 12, 2);
            $table->timestamps();
            
            $table->unique(['investisseur_id','loan_request_id']); // 1 ligne par projet dans le panier
            $table->enum('type_investment', ['pret_sans_interet', 'pret_avec_interet', 'don'])->default('pret_sans_interet');
            $table->enum('status', [
                'En attente de signature', 
                'Signature en cours', 
                'Échec signature', 
                'Partiellement signé', 
                'Signé et en attente de fonds', 
                'Actif', 
                'Remboursé', 
                'Refusé', 
                'Expiré', 
                'Annulé'])->default('En attente de signature');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
