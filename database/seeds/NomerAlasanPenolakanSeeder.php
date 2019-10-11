<?php

use App\RefAlasan;
use Illuminate\Database\Seeder;

class NomerAlasanPenolakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // pisahkan nomer alasan
        $list_alasan = RefAlasan::all();
        foreach ($list_alasan as $alasan) {
            $lenth = strlen($alasan->NOMOR_PENOLAKAN);
            $alasan->nomer = $lenth > 1 ? substr($alasan->NOMOR_PENOLAKAN, 0, -1) : $alasan->NOMOR_PENOLAKAN;
            $alasan->save();
        }
    }
}
