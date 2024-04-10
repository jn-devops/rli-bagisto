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
        // Cart Table.
        Schema::table('cart', function (Blueprint $table) {
            $table->decimal('processing_fee', 12, 4)->default(0)->nullable()->after('base_grand_total');
        });

        // In orders Table.
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('processing_fee', 12, 4)->default(0)->nullable()->after('base_grand_total');
        });

        // In order_items Table.
        Schema::table('order_items', function (Blueprint $table) {
            $table->decimal('processing_fee', 12, 4)->default(0)->nullable()->after('total');
        });

        // In invoices Table.
        Schema::table('invoices', function (Blueprint $table) {
            $table->decimal('processing_fee', 12, 4)->default(0)->nullable()->after('base_grand_total');
        });

        // In invoice items Table.
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->decimal('processing_fee', 12, 4)->default(0)->nullable()->after('base_total');
        });

        // In shipment_items Table.
        Schema::table('shipment_items', function (Blueprint $table) {
            $table->decimal('processing_fee', 12, 4)->default(0)->nullable()->after('base_total');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->string('name')->after('id')->nullable();
            $table->string('address')->after('email')->nullable();
            $table->integer('is_kyc_verified')->after('is_verified')->default(0);
        });

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
        // Cart Table.
        Schema::table('cart', function (Blueprint $table) {
            $table->dropIfExists('processing_fee');
        });

        // In orders Table.
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIfExists('processing_fee');
        });

        // In order_items Table.
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropIfExists('processing_fee');
        });

        // In invoice_items Table.
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropIfExists('processing_fee');
        });

        // In invoices Table.
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropIfExists('processing_fee');
        });

        // In shipment_items Table.
        Schema::table('shipment_items', function (Blueprint $table) {
            $table->dropIfExists('base_total');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->dropIfExists('name');
            $table->dropIfExists('address');
            $table->dropIfExists('is_kyc_verified');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIfExists('property_code');
        });

        Schema::table('cart', function (Blueprint $table) {
            $table->dropIfExists('property_code');
        });
    }
};
