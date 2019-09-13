<?php

use App\RefAlasan;
use Illuminate\Database\Seeder;

class RefAlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefAlasan::whereBetween('ID', [1, 114])->update(['id_jenis_pkb'=> 1]); // Pengembang Diri
        RefAlasan::whereBetween('ID', [116, 176])->update(['id_jenis_pkb'=> 2]); // Publikasi Ilmiah
        RefAlasan::whereBetween('ID', [177, 230])->update(['id_jenis_pkb'=> 3]); // Karya Inovatif
    }
}
