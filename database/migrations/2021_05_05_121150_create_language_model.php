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
        Schema::create('language_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->constrained('languages');
            $table->foreignId('language_proficiency_id')->nullable()->constrained('language_proficiencies');
            $table->unsignedBigInteger('language_model_id');
            $table->string('language_model_type');
            $table->timestampsTz();
            $table->unique(['language_id', 'language_model_id', 'language_model_type'], 'language_model_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_models');
    }
};
