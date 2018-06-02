<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComenziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comenzi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nume_client');
            $table->string('adresa_client');
            $table->string('telefon_client');
            $table->string('lat_adresa_client');
            $table->string('lng_adresa_client');
            $table->string('nume_destinatar');
            $table->string('adresa_destinatar');
            $table->string('telefon_destinatar');
            $table->string('lat_adresa_destinatar');
            $table->string('lng_adresa_destinatar');
            $table->string('nume_produs');
            $table->smallInteger('dimensiune_produs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comenzi');
    }
}
