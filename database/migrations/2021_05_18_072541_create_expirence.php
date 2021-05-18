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
        Schema::create('expirences', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->boolean('local')->default(false);
            $table->boolean('national')->default(false);
            $table->boolean('international')->default(false);
            $table->timestampsTz();
        });

        Artisan::call('db:seed', [
            '--class' => ExpirenceSeeder::class,
            '--force' => true
        ]);

        Schema::table('volunteers', function (Blueprint $table) {
            $table->foreignId('local_expirence_id')->nullable()->after('country_id')->constrained('expirences');
            $table->foreignId('national_expirence_id')->nullable()->after('local_expirence_id')->constrained('expirences');
            $table->foreignId('international_expirence_id')->nullable()->after('national_expirence_id')->constrained('expirences');
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
            $table->dropForeign(['local_expirence_id']);
            $table->dropColumn('local_expirence_id');
            $table->dropForeign(['national_expirence_id']);
            $table->dropColumn('national_expirence_id');
            $table->dropForeign(['international_expirence_id']);
            $table->dropColumn('international_expirence_id');
        });

        Schema::dropIfExists('expirences');
    }
}
