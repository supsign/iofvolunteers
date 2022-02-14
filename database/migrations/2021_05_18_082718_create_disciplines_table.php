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
        Schema::create('disciplines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestampsTz();
        });

        Artisan::call('db:seed', [
            '--class' => DisciplineSeeder::class,
            '--force' => true,
        ]);

        Schema::create('discipline_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discipline_id')->constrained('disciplines');
            $table->unsignedBigInteger('discipline_model_id');
            $table->string('discipline_model_type');
            $table->timestampsTz();
            $table->unique(
                ['discipline_id', 'discipline_model_id', 'discipline_model_type'],
                'discipline_model_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discipline_models');
        Schema::dropIfExists('disciplines');
    }
};
