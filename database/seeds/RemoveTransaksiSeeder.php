<?php

use Illuminate\Database\Seeder;

use Symfony\Component\Console\Output\ConsoleOutput as Output;
class RemoveTransaksiSeeder extends Seeder
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
        ];

        \DB::beginTransaction();

        foreach ($list_tabel_transaksi as $tabel) {
            \DB::table($tabel)->delete();
            $this->output->writeln('<info>deleted '. $tabel.'</info>');
        }
        \DB::commit();
    }
}
