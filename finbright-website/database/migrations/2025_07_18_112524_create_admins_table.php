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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('phone_number')->nullable()->unique();
            $table->string('status')->default("Activation en cours"); // 'Actif', 'Activation en cours', 'inactif'
            $table->rememberToken()->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Clés étrangères (ajoutées après les autres champs pour une meilleure lisibilité)
            $table->foreignId('profile_picture_id')->nullable()->constrained('files')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
