<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Carnegie_Classification extends Model
{
    public $table = "carnegie_classifications";  //EHLbug: I made this plural to allow it to pull in from a view

    protected $fillable=[
        'School_ID',
        'Year',
        'Cng_2010_Basic',
        'Cng_2010_UGPgm',
        'Cng_2010_GradPgm',
        'Cng_2010_UGPrf',
        'Cng_2010_EnrollPrf',
        'Cng_2010_SizeSetting',
        'Cng_2000'
        ];
    //protected $primaryKey = 'Application_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }
}


