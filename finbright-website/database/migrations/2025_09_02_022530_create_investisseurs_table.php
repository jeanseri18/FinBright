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
        Schema::create('investisseurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('capital_investi', 15, 2)->nullable();
            $table->decimal('revenu_annuel', 15, 2)->nullable();
            $table->string('profil_risque')->nullable(); // prudent, équilibré, dynamique
            $table->longText('profession')->nullable();
            $table->boolean('ppe')->default(false);
            $table->longText('fonction')->nullable();
            $table->longText('type_of_lender')->nullable();
            $table->date('creation_date')->nullable();
            $table->string('denomination_sociale')->nullable();
            $table->string('forme_juridique')->nullable();
            $table->string('numero_immatriculation')->unique()->nullable();
            $table->timestamps();
            $table->string('iban')->nullable();
            $table->enum('iban_status', ['none','pending','validated','rejected'])->default('none');

            $table->string('psp_account_id')->nullable(); // id compte Stripe/MangoPay
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investisseurs');
    }
};
