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
        Schema::create('security_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->constrained('admins')->nullOnDelete();
            $table->string('event_type'); // Ex: Unauthorized Access, Data Updated...
            $table->string('action_taken'); // Description courte
            $table->string('source_ip')->nullable();
            $table->enum('severity', ['Faible', 'Moyen', 'Élévé', 'Critique'])->default('Faible');
            $table->string('method')->nullable(); // POST, PUT, DELETE...
            $table->json('context')->nullable(); // Données additionnelles (ex: payload, resource_id, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_logs');
    }
};
