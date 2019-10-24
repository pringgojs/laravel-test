<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiUsulan extends Model
{
    protected $table = 'transaksi_usulan';
    protected $primaryKey = 'id_usulan';
    public $timestamps = false;

}
