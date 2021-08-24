<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectStatiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_stati', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestampsTz();
        });

        Artisan::call('db:seed', [
            '--class' => ProjectStatusSeeder::class,
            '--force' => true
        ]);

        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('project_status_id')->after('country_id')->constrained('project_stati');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_stati');
    }
}
