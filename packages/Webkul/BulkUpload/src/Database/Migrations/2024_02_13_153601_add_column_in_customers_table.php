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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('middle_name')->nullable()->after('first_name');
            $table->unsignedSmallInteger('marital_status')->default(0)->after('gender');
            $table->string('country_code')->after('gender');
            $table->string('suffix')->after('gender');
            $table->string('citizenship')->after('gender');
            $table->string('email_type')->nullable()->after('email');
            $table->string('phone_type')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropIfExists('middle_name');
        });
    }
};
