<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnJenisDetailPkbDataKtiGuruTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_kti_guru', function ($table) {
            $table->integer('id_pkb_detail')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_kti_guru', function ($table) {
            $table->dropColumn(['id_pkb_detail']);
        });
    }
}
