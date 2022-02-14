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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->boolean('local')->default(false);
            $table->boolean('national')->default(false);
            $table->boolean('international')->default(false);
            $table->timestampsTz();
        });

        Artisan::call('db:seed', [
            '--class' => ExperienceSeeder::class,
            '--force' => true,
        ]);

        Schema::table('volunteers', function (Blueprint $table) {
            $table->integer('local_experience')->nullable()->after('club');
            $table->integer('national_experience')->nullable()->after('local_experience');
            $table->integer('international_experience')->nullable()->after('national_experience');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('volunteers', function (Blueprint $table) {
            $table->dropColumn('local_experience');
            $table->dropColumn('national_experience');
            $table->dropColumn('international_experience');
        });

        Schema::dropIfExists('experiences');
    }
};
