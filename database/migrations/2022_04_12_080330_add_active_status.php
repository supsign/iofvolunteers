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
            $table->boolean('is_active');
        });

        Schema::table('hosts', function (Blueprint $table) {
            $table->boolean('is_active');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('is_active');
        });

        Schema::table('volunteers', function (Blueprint $table) {
            $table->boolean('is_active');
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
