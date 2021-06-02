<?php

use App\DataAkun;
use App\DataKTIGuru;
use App\DataDetailGuru;
use App\DataKTIGuruBackup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput as Output;

class CopyDataKTIGuruSeeder extends Seeder
{
    /**
     * @var Output
     */
    private $output;

    public function __construct(Output $output)
    {
        $this->output = $output;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ini_set('memory_limit', '-1');

        DB::beginTransaction();

        /** Periode usulan diganti setiap waktu */
        $default_periode = '2020.1';
        echo "masukkan periode usulan sebelumya ({$default_periode}): ";
        $input = trim(fgets(STDIN));
        $periode_usulan = $input;
        if ($input == '') {
            $periode_usulan = $default_periode;
        }
        // $periode_usulan = "2020.1";
        $list_data_kti = DataKTIGuru::all();
        foreach ($list_data_kti as $i => $kti_guru) {
            $datakun = DataDetailGuru::where('id_akun', $kti_guru->id_akun)->first();
            $nip = $datakun ? trim($datakun->nip) : null;

            $backup = new DataKTIGuruBackup;
            $backup->id_kti = $kti_guru->id_kti;
            $backup->id_akun = $kti_guru->id_akun;
            $backup->nip = $nip;
            $backup->tahun_buat_kti = $kti_guru->tahun_buat_kti;
            $backup->no_urut = $kti_guru->no_urut;
            $backup->judul_kti = $kti_guru->judul_kti;
            $backup->id_jenis_pkb = $kti_guru->id_jenis_pkb;
            $backup->id_alasan = $kti_guru->id_alasan;
            $backup->nilai_kti = $kti_guru->nilai_kti;
            $backup->ket_tambahan = $kti_guru->ket_tambahan;
            $backup->sedang_diperiksa = $kti_guru->sedang_diperiksa;
            $backup->periode_usulan = $periode_usulan;
            $backup->save();

            $this->output->writeln('<info>' . $i  . ' ' . $nip . ' ' . $backup->id_kti . '</info>');
        }

        DB::commit();
    }
}
