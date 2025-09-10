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
            $table->foreignId('investisseur_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('emprunteur_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['investisseur_id']);
            $table->dropColumn('investisseur_id');

            $table->dropForeign(['emprunteur_id']);
            $table->dropColumn('emprunteur_id');

            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
        });
    }
};
