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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('btn_color')->nullable()->after('banner_path');
            $table->string('btn_background_color')->nullable()->after('banner_path');
            $table->string('btn_border_color')->nullable()->after('banner_path');
            $table->unsignedInteger('sort')->default(0)->after('banner_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropIfExists('btn_color');
            $table->dropIfExists('btn_background');
            $table->dropIfExists('btn_border_color');
            $table->dropIfExists('sort');
        });
    }
};
