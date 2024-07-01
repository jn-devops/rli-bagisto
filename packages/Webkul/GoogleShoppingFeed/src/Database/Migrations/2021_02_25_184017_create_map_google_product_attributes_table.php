<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapGoogleProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_google_product_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('title_id')->nullable();
            $table->string('gtin_id')->nullable();
            $table->string('description_id')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('color_id')->nullable();
            $table->string('weight_id')->nullable();
            $table->string('image_id')->nullable();
            $table->string('size_id')->nullable();
            $table->string('size_system_id')->nullable();
            $table->string('size_type_id')->nullable();
            $table->string('mpn_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('map_google_product_attributes');
    }
}
