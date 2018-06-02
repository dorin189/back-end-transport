<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcAutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parc_auto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soferi_id')->nullable();
            $table->string('denumire_auto');
            $table->string('numar_inmatriculare');
            $table->integer('tonaj');
            $table->integer('km');
            $table->integer('revizie');
            $table->smallInteger('an_fabricatie');
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
        Schema::dropIfExists('parc_auto');
    }
}
