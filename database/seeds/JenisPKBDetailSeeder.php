<?php

use App\RefJenisPKBDetail;
use Illuminate\Database\Seeder;

class JenisPKBDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefJenisPKBDetail::truncate();
        $list_data = [
            1 => [
                [
                    'nama' => 'Diklat fungsional',
                    'nomer_alasan' => '1',
                ],
                [
                    'nama' => 'Kegiatan kolektif guru',
                    'nomer_alasan' => '2',
                ],
            ],
            2 => [
                [
                    'nama' => 'Presentasi di forum ilmiah',
                    'nomer_alasan' => '1,2,3,4,17,5',
                ],
                [
                    'nama' => 'Laporan Hasil Penelitian',
                    'nomer_alasan' => '1,2,3,4,17,6',
                ],
                [
                    'nama' => 'Laporan Hasil Penelitian Tindakan',
                    'nomer_alasan' => '1,2,3,4,17,7',
                ],
                [
                    'nama' => 'Laporan Hasil Penelitian yang dimuat di Jurnal Ilmiah',
                    'nomer_alasan' => '1,2,3,4,17,8',
                ],
                [
                    'nama' => 'Tinjauan ilmiah',
                    'nomer_alasan' => '1,2,3,4,17,9',
                ],
                [
                    'nama' => 'Tulisan ilmiah populer',
                    'nomer_alasan' => '1,2,3,4,17,10',
                ],
                [
                    'nama' => 'Artikel ilmiah',
                    'nomer_alasan' => '1,2,3,4,17,11',
                ],
                
                [
                    'nama' => 'Buku Pelajaran',
                    'nomer_alasan' => '1,2,3,4,17,12',
                ],
                
                [
                    'nama' => 'Modul/diktat',
                    'nomer_alasan' => '1,2,3,4,17,13',
                ],
                
                [
                    'nama' => 'Buku dalam bidang pendidikan',
                    'nomer_alasan' => '1,2,3,4,17,14',
                ],
                
                [
                    'nama' => 'Karya terjemahaan',
                    'nomer_alasan' => '1,2,3,4,17,15',
                ],
                
                [
                    'nama' => 'Buku Pedoman Guru',
                    'nomer_alasan' => '1,2,3,4,17,16',
                ],
            ],
            3 => [
                [
                    'nama' => 'Menemukan teknologi tepat guna',
                    'nomer_alasan' => '18',
                ],
                [
                    'nama' => 'Menemukan/menciptakan karya seni',
                    'nomer_alasan' => '19,20',
                ],
                [
                    'nama' => 'Membuat/memodifikasi alat pelajaran/peraga',
                    'nomer_alasan' => '21',
                ],
                [
                    'nama' => 'Membuat/memodifikasi alat praktikum',
                    'nomer_alasan' => '22',
                ],
                [
                    'nama' => 'Mengikuti pengembangan penyusunan  standar, pedoman, soal, dan sejenisnya',
                    'nomer_alasan' => '23',
                ],
            ],
        ];

        foreach ($list_data as $key => $list_jenis_pkb) {
            foreach ($list_jenis_pkb as $key2 => $detail_pkb) {
                $pkb = new RefJenisPKBDetail;
                $pkb->id_ref_jenis_pkb = $key;
                $pkb->nama = $detail_pkb['nama'];
                $pkb->nomer_alasan = $detail_pkb['nomer_alasan'];
                $pkb->save();
            }
        }
    }
}
