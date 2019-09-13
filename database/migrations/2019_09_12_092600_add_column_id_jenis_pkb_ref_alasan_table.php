<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIdJenisPkbRefAlasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ref_alasan_jawaban', function ($table) {
            $table->integer('id_jenis_pkb')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ref_alasan_jawaban', function ($table) {
            $table->dropColumn(['id_jenis_pkb']);
        });
    }
}
