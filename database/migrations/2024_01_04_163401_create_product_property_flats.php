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
        Schema::create('product_property_flats', function (Blueprint $table) {
            $table->id();
            $table->integer('slot_id');
            $table->integer('property_id');
            $table->string('flat_numbers');
            $table->string('x_coordinate');
            $table->string('y_coordinate');
            $table->string('width');
            $table->string('height');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_property_flats');
    }
};
