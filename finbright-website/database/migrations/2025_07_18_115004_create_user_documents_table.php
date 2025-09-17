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
        Schema::create('user_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('file_id')->nullable()->constrained('files')->onDelete('set null');
            $table->string('type'); // Ex: 'piece_identite', 'justificatif_domicile', etc.
            $table->string('explanation')->nullable();
            $table->enum('status', ['À approuver', 'Validé', 'Refusé'])->default('À approuver');
            $table->timestamps();

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
        Schema::dropIfExists('user_documents');
    }
};
