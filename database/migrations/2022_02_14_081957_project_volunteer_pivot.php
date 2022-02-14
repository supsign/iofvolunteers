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
        Schema::create('project_volunteer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('volunteer_id')->constrained();
            $table->timestampTz('project_contacted_at')->nullable();
            $table->timestampTz('volunteer_contacted_at')->nullable();
            $table->timestampsTz();
            $table->unique(['project_id', 'volunteer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_volunteer');
    }
};
