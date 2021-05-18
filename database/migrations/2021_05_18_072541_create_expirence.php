<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpirence extends Migration
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
            '--force' => true
        ]);

        Schema::table('volunteers', function (Blueprint $table) {
            $table->foreignId('local_experience_id')->nullable()->after('country_id')->constrained('experiences');
            $table->foreignId('national_experience_id')->nullable()->after('local_experience_id')->constrained('experiences');
            $table->foreignId('international_experience_id')->nullable()->after('national_experience_id')->constrained('experiences');
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
            $table->dropForeign(['local_experience_id']);
            $table->dropColumn('local_experience_id');
            $table->dropForeign(['national_experience_id']);
            $table->dropColumn('national_experience_id');
            $table->dropForeign(['international_experience_id']);
            $table->dropColumn('international_experience_id');
        });

        Schema::dropIfExists('experiences');
    }
}
