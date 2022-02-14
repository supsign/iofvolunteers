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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gender_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('country_id')->nullable()->constrained();
            $table->foreignId('organisation_language_id')->nullable()->constrained('languages');
            $table->string('name');
            $table->string('organisation_name');
            $table->string('organisation_webpage')->nullable();
            $table->string('organisation_contact');
            $table->string('organisation_contact_position');
            $table->string('organisation_email');
            $table->string('organisation_phone');
            $table->timestampTz('start_date')->nullable();
            $table->string('contact');
            $table->string('place');
            $table->string('offer_text')->nullable();
            $table->string('exprience_details');

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
        Schema::dropIfExists('projects');
    }
};
