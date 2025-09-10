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
        Schema::table('loan_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('loan_requests', 'emprunteur_id')) $table->foreignId('emprunteur_id')->constrained()->onDelete('cascade');

            if (Schema::hasColumn('loan_requests', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn([
                    'user_id',
                ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            //
        });
    }
};
