<?php

use App\TransaksiUsulan;
use Illuminate\Database\Seeder;

class FixNomerGenerateUsulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_transaksi = TransaksiUsulan::all();
        foreach ($list_transaksi as $key => $usulan) {
            $usulan->no_generated_surat = ++$key;
            $usulan->save();
        }
    }
}
