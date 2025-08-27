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
            if (Schema::hasColumn('loan_requests', 'duree_campagne')) {
                $table->integer('duree_campagne')->nullable()->default(9)->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            if (Schema::hasColumn('loan_requests', 'duree_campagne')) {
                // Revenir au type decimal (exemple : 8 chiffres, 2 décimales)
                $table->decimal('duree_campagne', 8, 2)->nullable()->default(9.00)->change();
            }
        });
    }
};
