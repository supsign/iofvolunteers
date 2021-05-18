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
            $table->boolean('driving_licence')->default(false);
            $table->unsignedSmallInteger('start_year')->nullable();
            $table->unsignedSmallInteger('duration')->nullable();
            $table->string('club')->nullable();
            $table->text('skill_mapping');
            $table->text('skill_coaching');
            $table->text('skill_it');
            $table->text('skill_event_org');
            $table->text('skill_teaching');
            $table->text('skill_other');
            $table->text('help');
            $table->text('expectation');
            $table->text('experience');
            $table->text('education');
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
