<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPeriodeNaikPangkatJabatanMasaPenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('masa_penilaian', function ($table) {
            $table->date('periode_naik_pangkat')->nullable();
            $table->date('periode_naik_jabatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('masa_penilaian', function ($table) {
            $table->dropColumn(['periode_naik_pangkat', 'periode_naik_jabatan']);
        });
    }
}
