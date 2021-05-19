<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContinentModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continent_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('continent_id')->constrained('continents');
            $table->unsignedBigInteger('continent_model_id');
            $table->string('continent_model_type');
            $table->timestampsTz();
            $table->unique(['continent_id', 'continent_model_id', 'continent_model_type'], 'continent_model_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('continent_models');
    }
}
