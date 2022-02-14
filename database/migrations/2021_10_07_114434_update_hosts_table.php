<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hosts', function (Blueprint $table) {
            $table->unsignedSmallInteger('max_duration')->after('country_id');
            $table->string('host_desc')->after('max_duration');
            $table->string('guest_expectations')->after('host_desc')->nullable();
            $table->string('name')->after('guest_expectations');
            $table->string('contact_phone')->after('name');
            $table->string('contact_email')->after('contact_phone');
            $table->string('contact_other')->after('contact_email')->nullable();
            $table->string('other_languages')->after('contact_other')->nullable();
            $table->string('offer_text')->after('other_languages')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hosts', function (Blueprint $table) {
            $table->dropColumn('maxDuration');
            $table->dropColumn('hostDesc');
            $table->dropColumn('guestExpectations');
            $table->dropColumn('name');
            $table->dropColumn('contact_phone');
            $table->dropColumn('contact_email');
            $table->dropColumn('contact_other');
            $table->dropColumn('other_languages');
            $table->dropColumn('offer_text');
        });
    }
};
