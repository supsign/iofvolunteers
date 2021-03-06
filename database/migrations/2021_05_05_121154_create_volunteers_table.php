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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gender_id')->nullable()->constrained();
            $table->foreignId('country_id')->nullable()->constrained();
            $table->boolean('active')->default(true);
            $table->string('name')->nullable();
            $table->timestampTz('birthdate')->nullable();
            $table->string('email')->nullable();
            $table->boolean('driving_licence')->default(false)->nullable();
            $table->unsignedSmallInteger('start_year')->nullable();
            $table->unsignedSmallInteger('ol_duration')->nullable();
            $table->unsignedSmallInteger('work_duration')->nullable();
            $table->string('club')->nullable();
            $table->unsignedSmallInteger('o_work_experience_local')->nullable();
            $table->unsignedSmallInteger('o_work_experience_international')->nullable();
            $table->text('skill_mapping')->nullable();
            $table->text('skill_coaching')->nullable();
            $table->text('skill_it')->nullable();
            $table->text('skill_event_organising')->nullable();
            $table->text('skill_teaching')->nullable();
            $table->text('skill_other')->nullable();
            $table->text('help')->nullable();
            $table->text('expectation')->nullable();
            $table->timestampsTz();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('volunteer_id')->after('lastname')->nullable()->constrained();
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
            $table->dropForeign(['volunteer_id']);
            $table->dropColumn('volunteer_id');
        });

        Schema::dropIfExists('volunteers');
    }
};
