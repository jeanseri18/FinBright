<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_documents', function (Blueprint $table) {
            $table->enum('status', ['À vérifier', 'Validé', 'Refusé'])->default('À vérifier')->change();
        });
    }

    public function down(): void
    {
        Schema::table('user_documents', function (Blueprint $table) {
            $table->enum('status', ['Vérification', 'Validé', 'Refusé'])->default('Vérification')->change();
        });
    }
};