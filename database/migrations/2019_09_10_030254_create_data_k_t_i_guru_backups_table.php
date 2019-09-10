<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataKTIGuruBackupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kti_guru_backup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_kti')->nullable();
            $table->integer('id_akun')->unsigned()->nullable();
            $table->string('nip')->nullable();
            $table->string('tahun_buat_kti')->nullable();
            $table->integer('no_urut')->unsigned()->nullable();
            $table->text('judul_kti')->nullable();
            $table->integer('id_jenis_pkb')->unsigned()->nullable();
            $table->integer('id_alasan')->unsigned()->nullable();
            $table->string('nilai_kti')->nullable();
            $table->string('ket_tambahan')->nullable();
            $table->integer('sedang_diperiksa')->unsigned()->nullable();
            $table->string('periode_usulan')->nullable(); // 2019.1
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_kti_guru_backup');
    }
}
