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
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedSmallInteger('o_work_experience_local')->after('exprience_details')->nullable();
            $table->unsignedSmallInteger('o_work_experience_international')->after('o_work_experience_local')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('o_work_experience_local');
            $table->dropColumn('o_work_experience_international');
        });
    }
};
