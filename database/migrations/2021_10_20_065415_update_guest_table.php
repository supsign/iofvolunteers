<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->string('name')->after('country_id');
            $table->datetime('birthdate')->after('name')->nullable();
            $table->string('email')->after('birthdate');
            $table->string('phone')->after('email');
            $table->string('contact_other')->after('phone')->nullable();
            $table->boolean('driving_licence')->after('contact_other')->default(false);
            $table->unsignedSmallInteger('ol_duration')->after('driving_licence');
            $table->string('club')->after('ol_duration')->nullable();
            $table->integer('local_experience')->after('club')->nullable();
            $table->integer('national_experience')->after('local_experience')->nullable();
            $table->integer('international_experience')->after('national_experience')->nullable();
            $table->string('other_languages')->after('international_experience')->nullable();
            $table->string('o_expectations')->after('international_experience')->nullable();
            $table->string('motivation')->after('o_expectations')->nullable();
            $table->string('health_restrictions')->after('motivation')->nullable();
            $table->string('offer')->after('health_restrictions')->nullable();
            $table->string('other_input')->after('offer')->nullable();
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
            $table->dropColumn('name');
            $table->dropColumn('birthdate');
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('contact_other');
            $table->dropColumn('driving_licence');
            $table->dropColumn('ol_duration');
            $table->dropColumn('club');
            $table->dropColumn('local_experience');
            $table->dropColumn('national_experience');
            $table->dropColumn('international_experience');
            $table->dropColumn('other_languages');
            $table->dropColumn('o_expectations');
            $table->dropColumn('motivation');
            $table->dropColumn('health_restrictions');
            $table->dropColumn('offer');
            $table->dropColumn('other_input');
        });
    }
}
