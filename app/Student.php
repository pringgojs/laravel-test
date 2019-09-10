<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    public $timestamps = false;
    protected $guarded = array();
    
    public function programStudy()
    {
        return $this->belongsTo('App\ProgramStudy', 'program_study_id');
    }
}
