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
        Schema::table('hosts', function (Blueprint $table) {
            $table->text('host_desc')->change();
            $table->text('guest_expectations')->change();
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->text('o_expectations')->change();
            $table->text('motivation')->change();
            $table->text('health_restrictions')->change();
            $table->text('offer')->change();
            $table->text('other_input')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
