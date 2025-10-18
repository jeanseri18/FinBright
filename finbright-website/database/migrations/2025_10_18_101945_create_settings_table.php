<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('value')->nullable();
            $table->timestamps();
        });

        // Seed defaults (optionnel)
        DB::table('settings')->insert([
            ['key' => 'trash.auto_delete', 'value' => json_encode(true), 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'trash.frequency', 'value' => json_encode('weekly'), 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'logs.auto_delete', 'value' => json_encode(true), 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'logs.frequency', 'value' => json_encode('weekly'), 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'loanRequests.auto_validate', 'value' => json_encode(true), 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'loanRequests.frequency', 'value' => json_encode('weekly'), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};