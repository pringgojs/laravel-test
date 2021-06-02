<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RefJadwalHapakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ref_jadwal_hapak')->insert([
            'id' => 1,
            'mulai' => Carbon::parse('01-02-2021'),
            'sampai' => Carbon::parse('28-02-2021'),
        ]);
    }
}
