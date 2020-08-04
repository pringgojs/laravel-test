<?php

use App\DataPakGuru;
use Illuminate\Database\Seeder;
use App\DataPenilaianFinalPakGuru;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Output\ConsoleOutput as Output;

class ClearCopyDatabaseTransaksi extends Seeder
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
        ini_set('memory_limit', '-1');

        $list_tabel_transaksi = [
            'transaksi_detail_usulan',
            'transaksi_penilai_usulan',
            'transaksi_penilai_usulan_copy',
            'transaksi_usulan',
            'transaksi_verifikator_penilai_usulan',
            'transaksi_verifikator_penilai_usulan_distinct',
            'usulan_perbulan',
            'data_kti_guru',
            'data_pak_guru',
            'data_penilaian_final_kti_guru',
            'data_penilaian_final_pak_guru',
            'data_penilaian_kti_guru',
            'data_surat_permintaan_kelengkapan',
            // 'ref_jenis_pkb', => sudah tidak perlu karena data master sudah ada
        ];

        \DB::beginTransaction();

        /** Perbaiki data dengan cara :
         * 1. Copy data dari tabel asal ke tabel tujuan, 
         * 2. tabel asa kemudian di bersihkan
         * 
        */
        $pak_guru = DataPakGuru::where('periode_pangkat', '0000-00-00')
            ->update(['periode_pangkat' => null]);
        $pak_guru = DataPakGuru::where('periode_jabatan', '0000-00-00')
            ->update(['periode_jabatan' => null]);
        $pak_guru = DataPenilaianFinalPakGuru::where('periode_pangkat', '0000-00-00')
            ->update(['periode_pangkat' => null]);
        $pak_guru = DataPenilaianFinalPakGuru::where('periode_jabatan', '0000-00-00')
            ->update(['periode_jabatan' => null]);

        foreach ($list_tabel_transaksi as $tabel) {
            $new_tabel = $tabel.'_1';
            // if (Schema::hasTable($new_tabel)) {
            //     info($new_tabel);
            //     continue;
            // }
            
            // \DB::statement('create table '.$new_tabel.' SELECT * from '.$tabel);
            \DB::statement('insert into '.$new_tabel.' SELECT * from '.$tabel);
            $this->output->writeln('<info>copied '. $tabel.'</info>');
            $this->output->writeln('<info>deleted '. $tabel.'</info>');
            \DB::table($tabel)->delete();
        }
        \DB::commit();
    }
}
