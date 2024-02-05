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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('name')->after('id')->nullable();
            $table->string('address')->after('email')->nullable();
            $table->integer('is_kyc_verified')->after('is_verified')->default(0);
        });

        Schema::table('ekyc_verifications', function (Blueprint $table) {
            $table->text('transaction_id')->after('cart_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropIfExists('name');
            $table->dropIfExists('address');
            $table->dropIfExists('is_kyc_verified');
        });

        Schema::table('ekyc_verifications', function (Blueprint $table) {
            $table->dropIfExists('transaction_id');
        });
    }
};
