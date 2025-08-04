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
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('type'); // 'deposit', 'withdrawal', 'investment', 'repayment_in', 'repayment_out'
                $table->decimal('amount', 15, 2);
                $table->string('status')->default('pending'); // 'pending', 'completed', 'failed'
                $table->text('description')->nullable();
                $table->foreignId('wallet_id')->nullable()->constrained()->onDelete('set null'); // Optionnel
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
