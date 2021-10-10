<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianPeriodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_penilaian_periode', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('penilaian_mulai')->nullable();
            $table->date('penilaian_sampai')->nullable();
            $table->integer('periode')->unsigned()->nullable()->unique();
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
        Schema::drop('ref_penilaian_periode', function (Blueprint $table) {
            //
        });
    }
}
