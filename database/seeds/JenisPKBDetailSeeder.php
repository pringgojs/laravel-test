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
                    'nomer_alasan' => '1,4,17,6',
                ],
            ],
            2 => [
                'Presentasi di forum ilmiah',
                'Laporan Hasil Penelitian',
                'Laporan Hasil Penelitian Tindakan',
                'Laporan Hasil Penelitian yang dimuat di Jurnal Ilmiah',
                'Tinjauan ilmiah',
                'Tulisan ilmiah populer',
                'Artikel ilmiah',
                'Buku Pelajaran',
                'Modul/diktat',
                'Buku dalam bidang pendidikan',
                'Karya terjemahaan',
                'Buku Pedoman Guru'
            ],
            3 => [
                'Menemukan teknologi tepat guna',
                'Menemukan/menciptakan karya seni',
                'Membuat/memodifikasi alat pelajaran/peraga',
                'Membuat/memodifikasi alat praktikum',
                'Mengikuti pengembangan penyusunan  standar, pedoman, soal, dan sejenisnya'
            ],
        ];

        foreach ($list_data as $key => $list_jenis_pkb) {
            foreach ($list_jenis_pkb as $key2 => $detail_pkb) {
                $pkb = new RefJenisPKBDetail;
                $pkb->id_ref_jenis_pkb = $key;
                $pkb->nama = $detail_pkb;
                $pkb->save();
            }
        }
    }
}
