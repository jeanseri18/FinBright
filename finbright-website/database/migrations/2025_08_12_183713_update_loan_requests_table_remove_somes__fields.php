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
            $table->dropColumn('amount');
            $table->dropColumn('duration');
            $table->dropColumn('deferred');
            $table->dropColumn('deferred_months');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            // Remplacez par les types de colonnes exacts que vous aviez initialement
            $table->decimal('amount', 10, 2)->after('id')->nullable();
            $table->integer('duration')->after('amount')->nullable();
            $table->boolean('deferred')->default(false)->after('duration');
            $table->integer('deferred_months')->after('deferred')->nullable();
        });
    }
};
