<?php

use App\TransaksiUsulan;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput as Output;

class FixNomerGenerateUsulanSeeder extends Seeder
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
        $list_transaksi = TransaksiUsulan::all();
        foreach ($list_transaksi as $key => $usulan) {
            $usulan->no_generated_surat = ++$key;
            $usulan->save();
            $this->output->writeln('<info>id usulan : '. $usulan->id_usulan.', ' . $usulan->no_generated_surat . '</info>');

        }
    }
}
