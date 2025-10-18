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
            $table->string('first_name')->nullable()->after('civility');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('email')->after('last_name');
            $table->date('email_verified_at')->nullable()->after('email');
            $table->string('password')->after('email');
            $table->date('birth_date')->nullable()->after('password');
            $table->string('birth_place')->nullable()->after('birth_date');
            $table->string('nationality')->nullable()->after('birth_place');
            $table->string('funds_from_country')->nullable()->after('nationality');
            $table->json('address')->nullable()->after('funds_from_country');
            $table->string('phone_number')->nullable()->unique()->after('address'); // Rend le numéro de téléphone unique
            $table->rememberToken()->after('password')->nullable();
            $table->timestamp('password_changed_at')->nullable();
            $table->boolean('is_profile_completed')->default(false);
            $table->string('status')->default('active'); // 'active', 'inactive'
            $table->enum('kyc_status', ['pending','validated','rejected'])->default('pending')->after('status');
            $table->timestamp('kyc_validated_at')->nullable()->after('kyc_status');
            $table->longText('kyc_refused_motif')->nullable()->after('kyc_validated_at');

            // Clés étrangères (ajoutées après les autres champs pour une meilleure lisibilité)
            $table->foreignId('profile_picture_id')->nullable()->constrained('files')->onDelete('set null'); // Assurez-vous que la table 'files' existera
            $table->foreignId('investisseur_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('emprunteur_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Pour annuler l'ajout de clés étrangères, il faut d'abord supprimer la contrainte
            $table->dropConstrainedForeignId('profile_picture_id');

            $table->dropColumn([
                'civility',
                'last_name',
                'first_name',
                'email',
                'email_verified_at',
                'birth_date',
                'birth_place',
                'nationality',
                'funds_from_country',
                'address',
                'phone_number',
                'status',
                'kyc_status',
                'kyc_validated_at',
                'kyc_refused_motif',
                'remember_token',
                'is_profile_completed',
                'password_changed_at',
            ]);
        });
        // Si vous avez supprimé le champ 'name' dans up(), ajoutez-le ici pour la fonction down()
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['investisseur_id']);
            $table->dropColumn('investisseur_id');

            $table->dropForeign(['emprunteur_id']);
            $table->dropColumn('emprunteur_id');
        });
    }
};
