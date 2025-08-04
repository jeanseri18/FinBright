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
        if (!Schema::hasTable('payments')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('transaction_id')->nullable()->constrained()->onDelete('set null');
                $table->decimal('amount', 15, 2);
                $table->string('status')->default('pending'); // 'pending', 'completed', 'failed'
                $table->string('psp_payment_id')->nullable(); // ID du paiement chez le PSP (ex: Stripe)
                $table->string('method')->nullable(); // 'card', 'bank_transfer', etc.
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
