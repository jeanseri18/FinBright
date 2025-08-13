<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users','kyc_status')) {
                $table->enum('kyc_status', ['pending','validated','rejected'])->default('pending')->after('status');
            }
            if (!Schema::hasColumn('users','kyc_validated_at')) {
                $table->timestamp('kyc_validated_at')->nullable()->after('kyc_status');
            }
            if (!Schema::hasColumn('users','iban')) {
                $table->string('iban')->nullable()->after('phone_number');
            }
            if (!Schema::hasColumn('users','iban_status')) {
                $table->enum('iban_status', ['none','pending','validated','rejected'])->default('none')->after('iban');
            }
            if (!Schema::hasColumn('users','psp_account_id')) {
                $table->string('psp_account_id')->nullable()->after('iban_status'); // id compte Stripe/MangoPay
            }
        });
    }
    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['kyc_status','kyc_validated_at','iban','iban_status','psp_account_id']);
        });
    }
};