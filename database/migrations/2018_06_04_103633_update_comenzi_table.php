<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateComenziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comenzi', function (Blueprint $table) {
            $table->boolean('is_asigned')->default(0)->after('dimensiune_produs');
            $table->string('nume_sofer')->nullable()->after('is_asigned');
            $table->unsignedInteger('asigned_id')->default(0)->after('nume_sofer');

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
        Schema::table('comenzi', function (Blueprint $table) {
            $table->dropColumn('is_asigned');
            $table->dropColumn('nume_sofer');
            $table->dropColumn('asigned_id');
        });
    }
}
