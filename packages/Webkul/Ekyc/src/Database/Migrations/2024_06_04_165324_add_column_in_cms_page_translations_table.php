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
        Schema::table('cms_page_translations', function (Blueprint $table) {
            $table->string('btn_title')->after('url_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cms_page_translations', function (Blueprint $table) {
            $table->dropIfExists('btn_title');
        });
    }
};
