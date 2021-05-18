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
            $table->string('club')->nullable();
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
