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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('host_id')->after('volunteer_id')->nullable()->constrained();
        });

        Schema::table('hosts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->foreignId('country_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['host_id']);
            $table->dropColumn('host_id');
        });
        Schema::table('hosts', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained();
        });
    }
};
