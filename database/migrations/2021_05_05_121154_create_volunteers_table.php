<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
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
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('country_id')->nullable()->constrained();
            $table->string('name')->nullable();
            $table->string('nickname')->nullable();
            $table->timestampTz('birthdate')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('driving_licence')->default(false)->nullable();
            $table->unsignedSmallInteger('start_year')->nullable();
            $table->unsignedSmallInteger('ol_duration')->nullable();
            $table->unsignedSmallInteger('work_duration')->nullable();
            $table->string('club')->nullable();
            $table->string('other_languages')->nullable();
            $table->text('skill_mapping')->nullable();
            $table->text('skill_coaching')->nullable();
            $table->text('skill_it')->nullable();
            $table->text('skill_event_organising')->nullable();
            $table->text('skill_teaching')->nullable();
            $table->text('skill_other')->nullable();
            $table->text('help')->nullable();
            $table->text('expectation')->nullable();
            $table->text('experience')->nullable();
            $table->text('education')->nullable();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
}
