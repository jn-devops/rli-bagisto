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
            $table->string('name');
            $table->string('type');
            $table->string('from_type');
            $table->unsignedInteger('postions');
            $table->string('value');
            $table->unsignedInteger('customer_id');
            $table->unsignedBigInteger('attribute_id');
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
