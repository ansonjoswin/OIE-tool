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

            'id',
            'opeid',
            'year',
            'default_rate1',
            'default_rate2',
            'default_rate3',


	];

	protected $primaryKey = 'id';
	//public $incrementing = false;

    public function schools() {
        return $this->belongsTo('App\School');
    }
}
