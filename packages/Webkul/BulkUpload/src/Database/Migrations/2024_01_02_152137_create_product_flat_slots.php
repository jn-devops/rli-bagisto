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
        Schema::create('product_flat_slots', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('slot_id');
            $table->integer('x_coordinate');
            $table->integer('y_coordinate');
            $table->string('image_url');
            $table->string('flat_numbers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_flat_slots');
    }
};
