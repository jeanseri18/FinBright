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
        Schema::table('users', function (Blueprint $table) {
            // Supprimer les contraintes de clé étrangère AVANT les colonnes
            if (Schema::hasColumn('users', 'etablissement_id')) $table->dropForeign(['etablissement_id']);
            if (Schema::hasColumn('users', 'risk_level_id')) $table->dropForeign(['risk_level_id']); // si elle existe aussi
            if (Schema::hasColumn('users', 'psp_account_id')) $table->dropForeign(['psp_account_id']); // si elle existe aussi

            // Ensuite on supprime les colonnes
            $table->dropColumn([
                'diploma',
                'specialization',
                'current_study_year',
                'remaining_years',
                'graduation_date',
                'etablissement_id',
                'risk_level_id',
                'profession',
                'type_of_lender',
                'iban',
                'iban_status',
                'psp_account_id',
                'extra_data',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
