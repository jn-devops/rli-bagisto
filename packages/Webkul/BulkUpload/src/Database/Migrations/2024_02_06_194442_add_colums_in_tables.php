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
        Schema::table('cart', function (Blueprint $table) {
            $table->string('property_code')->nullable()->after('processing_fee');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->string('property_code')->nullable()->after('processing_fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIfExists('property_code');
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->dropIfExists('property_code');
        });
    }
};
