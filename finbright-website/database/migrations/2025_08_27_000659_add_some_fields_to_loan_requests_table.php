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
            if (!Schema::hasColumn('loan_requests', 'explication')) {
                $table->longText('explication')->nullable()->after('object');
            }
            if (!Schema::hasColumn('loan_requests', 'presentation')) {
                $table->longText('presentation')->nullable()->after('object');
            }
            $table->integer('duree_campagne_modifications')->default(0);
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
