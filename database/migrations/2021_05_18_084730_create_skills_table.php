<?php

use Database\Seeders\SkillSeeder;
use Database\Seeders\SkillTypeSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('warn')->nullable();
            $table->string('text')->nullable();
            $table->timestampsTz();
        });

        Artisan::call('db:seed', [
            '--class' => SkillTypeSeeder::class,
            '--force' => true
        ]);

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('skill_type_id')->constrained();
            $table->timestampsTz();
        });

        Artisan::call('db:seed', [
            '--class' => SkillSeeder::class,
            '--force' => true
        ]);

        Schema::create('skill_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_id')->constrained('skills');
            $table->unsignedBigInteger('skill_model_id');
            $table->string('skill_model_type');
            $table->timestampsTz();
            $table->unique(['skill_id', 'skill_model_id', 'skill_model_type'], 'skill_model_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_models');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('skill_types');
    }
}
