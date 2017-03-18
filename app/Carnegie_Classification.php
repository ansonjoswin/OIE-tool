<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Carnegie_Classification extends Model
{
    public $table = "carnegie_classification";
    protected $fillable=[
        'School_ID',
        'Year',
        'Cng_Basic',
        'Cng_UGPgm',
        'Cng_GradPgm',
        'Cng_UGPrf',
        'Cng_EnrollPrf',
        'Cng_SizeSetting',
        'Cng_Classfication2000'

        ];
    //protected $primaryKey = 'Application_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }
}

