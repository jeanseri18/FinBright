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
            if (!Schema::hasColumn('loan_requests', 'amount')) {
                $table->decimal('amount', 15, 2)->after('user_id');
            }

            if (!Schema::hasColumn('loan_requests', 'duration')) {
                $table->integer('duration')->after('amount');
            }

            if (!Schema::hasColumn('loan_requests', 'deferred')) {
                $table->boolean('deferred')->default(false)->after('duration');
            }

            if (!Schema::hasColumn('loan_requests', 'deferred_months')) {
                $table->integer('deferred_months')->nullable()->after('deferred');
            }

            if (!Schema::hasColumn('loan_requests', 'simulation_result')) {
                $table->json('simulation_result')->nullable()->after('deferred_months');
            }

            if (!Schema::hasColumn('loan_requests', 'status')) {
                $table->string('status')->default('pending')->after('simulation_result');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            $table->dropColumn([
                'amount',
                'duration',
                'deferred',
                'deferred_months',
                'simulation_result',
                'status',
            ]);
        });
    }
};
