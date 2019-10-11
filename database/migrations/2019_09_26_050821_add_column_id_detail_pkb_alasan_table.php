<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIdDetailPkbAlasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ref_alasan_jawaban', function ($table) {
            $table->string('nomer')->nullable();
        });

        Schema::table('ref_jenis_pkb_details', function ($table) {
            $table->string('nomer_alasan')->nullable();
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
            $table->dropColumn(['nomer']);
        });

        Schema::table('ref_jenis_pkb_details', function ($table) {
            $table->dropColumn(['nomer_alasan']);
        });
    }
}
