<?php

use App\RefJenisPKB;
use Illuminate\Database\Seeder;

class JenisPKBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_data = [
            1 => 'Pengembang Diri',
            2 => 'Publikasi Ilmiah',
            3 => 'Karya Inovatif',
        ];

        foreach ($list_data as $key => $data) {
            $pkb = RefJenisPKB::find($key) ? : new RefJenisPKB;
            $pkb->id_jenis_pkb = $key;
            $pkb->nama_pkb = $data;
            $pkb->save();
        }
    }
}
