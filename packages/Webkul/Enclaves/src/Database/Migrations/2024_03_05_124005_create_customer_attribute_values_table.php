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
        Schema::create('customer_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('value')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedBigInteger('attribute_id')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_attributes');
    }
};
