<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComenziAsigned extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comenzi_asigned', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('sofer_id');
            $table->unsignedInteger('comenzi_id');

            $table->foreign('sofer_id')->references('id')->on('soferi');
            $table->foreign('comenzi_id')->references('id')->on('comenzi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comenzi_asigned');
    }
}
