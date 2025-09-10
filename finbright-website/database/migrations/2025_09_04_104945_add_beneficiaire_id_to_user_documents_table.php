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
        Schema::table('user_documents', function (Blueprint $table) {
            $table->foreignId('beneficiaire_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('investisseur_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('emprunteur_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_documents', function (Blueprint $table) {
            // Supprimer la contrainte FK
            $table->dropForeign(['beneficiaire_id']);

            // Supprimer ensuite la colonne
            $table->dropColumn('beneficiaire_id');
        });
    }
};
