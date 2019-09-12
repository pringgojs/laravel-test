<?php

use App\DataPakGuru;
use App\DataPenilaianFinalPakGuru;
use Illuminate\Database\Seeder;
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
        $list_tabel_transaksi = [
            // 'transaksi_detail_usulan',
            // 'transaksi_penilai_usulan',
            // 'transaksi_penilai_usulan_copy',
            // 'transaksi_usulan',
            // 'transaksi_verifikator_penilai_usulan',
            // 'transaksi_verifikator_penilai_usulan_distinct',
            // 'usulan_perbulan',
            // 'data_kti_guru',
            // 'data_pak_guru',
            // 'data_penilaian_final_kti_guru',
            // 'data_penilaian_final_pak_guru',
            // 'data_penilaian_kti_guru',
            // 'data_surat_permintaan_kelengkapan',

            'ref_jenis_pkb',
        ];

        \DB::beginTransaction();
        /** Perbaiki data */
        // $pak_guru = DataPakGuru::where('periode_pangkat', '0000-00-00')
        //     ->update(['periode_pangkat' => null]);
        // $pak_guru = DataPakGuru::where('periode_jabatan', '0000-00-00')
        //     ->update(['periode_jabatan' => null]);
        // $pak_guru = DataPenilaianFinalPakGuru::where('periode_pangkat', '0000-00-00')
        //     ->update(['periode_pangkat' => null]);
        // $pak_guru = DataPenilaianFinalPakGuru::where('periode_jabatan', '0000-00-00')
        //     ->update(['periode_jabatan' => null]);

        foreach ($list_tabel_transaksi as $tabel) {
            $new_tabel = $tabel.'_1';
            \DB::statement('create table '.$new_tabel.' SELECT * from '.$tabel);
            $this->output->writeln('<info>copied '. $tabel.'</info>');
            $this->output->writeln('<info>deleted '. $tabel.'</info>');
            \DB::table($tabel)->delete();
        }
        \DB::commit();
    }
}
