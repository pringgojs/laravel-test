<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataAkun extends Model
{
    protected $table = 'data_akun';
    protected $primaryKey = 'id_akun';
    public $timestamps = false;


    public function scopeJoinHak($q)
    {
        $q->join('data_hak_akses', 'data_hak_akses.id_akun', '=', $this->table.'.id_akun');
    }

    public function guru()
    {
        return $this->hasOne('App\DataDetailGuru', 'id_akun');
    }

    public function penilai()
    {
        return $this->hasOne('App\DataDetailPenilai', 'id_akun');
    }

    public function verifikator()
    {
        return $this->hasOne('App\DataDetailVerifikator', 'id_akun');
    }

    public function verifikatorPenilai()
    {
        return $this->hasOne('App\DataDetailVerifikatorPenilai', 'id_akun');
    }

    public function operator()
    {
        return $this->hasOne('App\DataDetailOperator', 'id_akun');
    }

}
