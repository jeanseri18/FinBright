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
            $table->decimal('amount', 15, 2)->after('emprunteur_id');
            $table->integer('duree_campagne')->nullable()->default(9);
            $table->boolean('deferred')->default(false)->after('duree_campagne');
            $table->integer('deferred_months')->nullable()->after('deferred');
            $table->json('simulation_result')->nullable()->after('deferred_months');
            $table->string('status')->default('pending')->after('simulation_result');
            $table->integer('interest_ratio');
            $table->integer('assurance_ratio')->nullable();

            $table->json('debt_params')->nullable()->after('status');
            $table->float('debt_ratio')->nullable()->after('debt_params');
            $table->string('object')->nullable()->after('debt_ratio');
            $table->longText('description')->nullable()->after('object');
            $table->longText('explication')->nullable()->after('object');
            $table->longText('presentation')->nullable()->after('object');
            $table->integer('duree_campagne_modifications')->default(0);
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
                'duree_campagne',
                'deferred',
                'deferred_months',
                'simulation_result',
                'status',
                'interest_ratio',
                'assurance_ratio',
                'debt_params', 
                'debt_ratio', 
                'object', 
                'description',
                'explication',
                'presentation',
                'duree_campagne_modifications',
            ]);
        });
    }
};
