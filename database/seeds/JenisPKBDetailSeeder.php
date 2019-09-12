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
                'Diklat fungsional',
                'Kegiatan kolektif guru'
            ],
            2 => [
                'Presentasi pada forum ilmiah',
                'Publikasi ilmiah atas hasil penelitian atau  gagasan ilmu di bidang pendidikan formal',
                'Publikasi buku pelajaran, buku pengayaan, dan pedoman guru'
            ],
            3 => [
                'Menemukan teknologi tepat guna',
                'Menemukan/menciptakan karya seni',
                'Membuat/memodifikasi alat pelajaran / peraga / praktikum',
                'Mengikuti pengembangan penyusunan  standar, pedoman,  soal dan sejenisnya'
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
