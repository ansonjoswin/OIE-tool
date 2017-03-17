<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class Finance extends Model
{
    protected $fillable=[
        //'Finance_ID',
        'School_ID',
        'Year',
        'Pub_TtlSalWage',
        'PrivProf_TtlSalWage',
        'PrivNProf_TtlSalWage',
    ];
  //  protected $primaryKey = 'Finance_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }
}
