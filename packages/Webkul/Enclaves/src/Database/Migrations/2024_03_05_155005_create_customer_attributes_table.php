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
        Schema::create('customer_attributes', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('code')->nullable();
            $table->text('type')->nullable();
            $table->string('form_type')->nullable();
            $table->unsignedInteger('postion')->nullable();
            $table->unsignedInteger('is_required')->nullable();
            $table->timestamps();
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
