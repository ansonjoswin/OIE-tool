<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carnegie_Classification extends Model
{
    public $table = "carnegie_classification";
    protected $fillable=[
        'school_id',
        'year',
        'carnegie_basic',
        'carnegie_ug_program',
        'carnegie_grad_program',
        'carnegie_ug_profile',
        'carnegie_enroll_profile',
        'carnegie_size_setting',
        'carnegie_classification2000'
        ];
    protected $primaryKey = 'school_id';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }
}
