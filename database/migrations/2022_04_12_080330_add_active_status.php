<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->boolean('is_active')->default(1)->after('other_languages');
        });

        Schema::table('hosts', function (Blueprint $table) {
            $table->boolean('is_active')->default(1)->after('offer_text');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('is_active')->default(1)->after('o_work_experience_international');
        });

        Schema::table('volunteers', function (Blueprint $table) {
            $table->boolean('is_active')->default(1)->after('expectation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('hosts', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('volunteers', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
