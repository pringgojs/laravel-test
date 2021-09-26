<?php

use App\DataAkun;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput as Output;

class ResetPasswordSeeder extends Seeder
{
    /**
     * @var Output
     */
    private $output;
    private $total = [];

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
        ini_set('memory_limit', '-1');

        /**
         * Kode Hak Akses
         * 1	Guru
         * 2	Pengawas
         * 3	Verifikator
         * 4	Penilai
         * 5	Administrator
         * 6	Operator
         * 7	Verifikator Penilai
         */

        self::resetGuru();
        self::resetPenilai();
        self::resetVerifPenilai();
        dd($this->total);
    }

    # Guru
    public function resetGuru()
    {
        \DB::beginTransaction();

        $this->output->writeln('<info>--- Reset Akun Guru ----</info>');
        $list_data_akun = DataAkun::joinHak()->where('data_hak_akses.id_hak_akses', 1)->get();
        $i = 0;
        foreach ($list_data_akun as $data_akun) {
            if (!$data_akun->guru) continue;
            if (!$data_akun->guru->nip) {
                info('Nip guru tidak ada ==> ' . $data_akun->id_akun);
                continue;
            }

            $data_akun->username = $data_akun->guru->nip;
            $data_akun->password = $data_akun->guru->nip;

            $data_akun->save();

            $this->output->writeln('<info>------ ' . ++$i . '. ' . $data_akun->username . ' (' . $data_akun->id_akun . ')</info>');
        }
        \DB::commit();
        array_push($this->total, ['total_guru' => $i]);
    }

    # Penilai
    public function resetPenilai()
    {
        \DB::beginTransaction();

        $this->output->writeln('<info>--- Reset Akun Penilai ----</info>');
        $list_data_akun = DataAkun::joinHak()->where('data_hak_akses.id_hak_akses', 4)->get();
        $i = 0;
        foreach ($list_data_akun as $data_akun) {
            if (!$data_akun->penilai) continue;

            if (!$data_akun->penilai->nip) {
                info('Nip penilai tidak ada ==> ' . $data_akun->id_akun);
                continue;
            }

            $data_akun->username = $data_akun->penilai->nip . 'p';
            $data_akun->password = $data_akun->penilai->nip;
            $data_akun->save();
            $this->output->writeln('<info>------ ' . ++$i . '. ' . $data_akun->username . '  (' . $data_akun->id_akun . ')</info>');
        }
        \DB::commit();
        array_push($this->total, ['total_penilai' => $i]);
    }

    # Verifikator Penilai
    public function resetVerifPenilai()
    {
        \DB::beginTransaction();

        $this->output->writeln('<info>--- Reset Akun Verifikator Penilai ----</info>');
        $list_data_akun = DataAkun::joinHak()->where('data_hak_akses.id_hak_akses', 7)->get();
        $i = 0;
        foreach ($list_data_akun as $data_akun) {
            if (!$data_akun->verifikatorPenilai) continue;

            if (!$data_akun->verifikatorPenilai->nip) {
                info('Nip verif penilai tidak ada ==> ' . $data_akun->id_akun);
                continue;
            }


            $data_akun->username = $data_akun->verifikatorPenilai->nip . 'vp';
            $data_akun->password = $data_akun->verifikatorPenilai->nip;
            $data_akun->save();

            $this->output->writeln('<info>------ ' . ++$i . '. ' . $data_akun->username . ' (' . $data_akun->id_akun . ')</info>');
        }

        \DB::commit();
        array_push($this->total, ['total_vefif_penilai' => $i]);
    }
}
