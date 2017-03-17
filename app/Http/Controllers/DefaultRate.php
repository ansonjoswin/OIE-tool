<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class DefaultRate extends Model
{
    //
    public $table = "defaultrates";
    protected $fillable=[

            'ID',
            'OPEID',
            'DefaultRate1',
            'DefaultRate2',
            'DefaultRate3',


	];

	protected $primaryKey = 'ID';
	//public $incrementing = false;

    public function school() {
        return $this->belongsTo('App\School');
    }
}
