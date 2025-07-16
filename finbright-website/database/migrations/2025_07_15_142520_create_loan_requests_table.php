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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // emprunteur
            $table->string('title');
            $table->text('description');
            $table->decimal('amount', 12, 2);         // Montant souhaité
            $table->decimal('interest_rate', 5, 2);   // Taux proposé
            $table->integer('duration');              // Durée en mois
            $table->enum('type', ['student', 'mini']);
            $table->boolean('deferred')->default(false); // différé partiel
            $table->integer('deferred_months')->nullable(); // durée du différé
            $table->enum('status', ['draft', 'pending', 'validated', 'rejected', 'funded'])->default('draft');
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
