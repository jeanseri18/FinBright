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
            $table->string('civility')->nullable()->after('id'); // M. Mme, Mlle
            $table->string('first_name')->after('civility');
            $table->string('last_name')->after('first_name');
            $table->string('email')->after('last_name');
            $table->string('password')->after('email');
            $table->date('birth_date')->nullable()->after('password');
            $table->string('birth_place')->nullable()->after('birth_date');
            $table->string('nationality')->nullable()->after('birth_place');
            $table->string('address')->nullable()->after('nationality');
            $table->string('phone_number')->nullable()->unique()->after('address'); // Rend le numéro de téléphone unique
            $table->string('diploma')->nullable()->after('phone_number');
            $table->string('specialization')->nullable()->after('diploma');
            $table->string('current_study_year')->nullable()->after('specialization'); // Ex: L1, M2, etc.
            $table->integer('remaining_years')->nullable()->after('current_study_year'); // Années restantes d'études
            $table->string('graduation_date')->nullable()->after('remaining_years'); // Date de diplomation si connu

            // Clés étrangères (ajoutées après les autres champs pour une meilleure lisibilité)
            $table->foreignId('etablissement_id')->nullable()->constrained('etablissements')->onDelete('set null');
            $table->foreignId('profile_picture_id')->nullable()->constrained('files')->onDelete('set null'); // Assurez-vous que la table 'files' existera
        });

        Schema::table('users', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Pour annuler l'ajout de clés étrangères, il faut d'abord supprimer la contrainte
            $table->dropConstrainedForeignId('etablissement_id');
            $table->dropConstrainedForeignId('profile_picture_id');

            $table->dropColumn([
                'civility',
                'last_name',
                'first_name',
                'birth_date',
                'birth_place',
                'nationality',
                'address',
                'phone_number',
                'diploma',
                'specialization',
                'current_study_year',
                'remaining_years',
                'graduation_date',
            ]);
        });
         // Si vous avez supprimé le champ 'name' dans up(), ajoutez-le ici pour la fonction down()
        Schema::table('users', function (Blueprint $table) {
            // $table->string('name')->after('email'); // Décommenter si vous l'avez supprimé dans up()
        });
    }
};
