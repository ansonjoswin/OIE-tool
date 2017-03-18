<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;


class PeerGroup extends Model
{
    //
    public $table = "peergroups";
    protected $fillable=[

			'peergroup_name',
			'private_public_flag',
			'user_id',
            'created_by',
    ];

    protected $primaryKey = 'peergroup_id';
    public static function getTableName() {
        return (new static)->getTable();
    }
	
    public function user() {
        return $this->belongsTo('App\User');
    }
	
	public function school() {
        return $this->belongsToMany('App\School',"peergroup_school","peergroup_id","school_id");

    }
}