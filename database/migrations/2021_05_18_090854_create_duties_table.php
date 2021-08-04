<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateDutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestampsTz();
        });

        Artisan::call('db:seed', [
            '--class' => DutySeeder::class,
            '--force' => true
        ]);

        Schema::create('duty_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestampsTz();
        });

        Artisan::call('db:seed', [
            '--class' => DutyTypeSeeder::class,
            '--force' => true
        ]);

        Schema::create('duty_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('duty_id')->constrained();
            $table->foreignId('duty_type_id')->constrained();
            $table->unsignedBigInteger('duty_model_id');
            $table->string('duty_model_type');
            $table->timestampsTz();
            $table->unique(['duty_id', 'duty_model_id', 'duty_type_id', 'duty_model_type'], 'duty_model_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duty_models');
        Schema::dropIfExists('duty_types');
        Schema::dropIfExists('duties');
    }
}
