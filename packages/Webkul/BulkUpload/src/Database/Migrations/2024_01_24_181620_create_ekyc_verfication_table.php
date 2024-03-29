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
        Schema::create('ekyc_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('cart_id');
            $table->text('transaction_id')->nullable();
            $table->string('sku');
            $table->integer('status');
            $table->json('payload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekyc_verfication');
    }
};
