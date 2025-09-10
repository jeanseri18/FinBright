<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('investments', function (Blueprint $table) {
            // Supprimer la contrainte de foreign key existante
            $table->dropForeign(['user_id']);
            // Supprimer la colonne
            $table->dropColumn('user_id');

            // Ajouter la nouvelle colonne investisseur_id avec la relation
            $table->foreignId('investisseur_id')->nullable()->constrained('users')->onDelete('cascade');

            // Ajouter les nouveaux champs
            $table->enum('type_investment', ['pret_sans_interet', 'pret_avec_interet', 'don'])->default('pret_sans_interet');
            $table->enum('status', ['À approuver', 'Validé', 'Refusé'])->default('À approuver');
        });
    }

    public function down(): void
    {
        Schema::table('investments', function (Blueprint $table) {
            $table->dropForeign(['investisseur_id']);
            $table->dropColumn(['investisseur_id', 'type_investment', 'status']);
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
};