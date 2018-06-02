<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoferiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soferi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nume');
            $table->string('prenume');
            $table->string('an_nastere');
            $table->string('categorie');
            $table->string('email');
            $table->string('numar_telefon');

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
        Schema::dropIfExists('soferi');
    }
}
