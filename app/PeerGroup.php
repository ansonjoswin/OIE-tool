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

			'PeerGroupName',
			'PriPubFlg',
			'User_ID',
    ];

    protected $primaryKey = 'PeerGroupID';
    public static function getTableName() {
        return (new static)->getTable();
    }
	
    public function user() {
        return $this->belongsTo('App\User');
    }
	
	public function school_peergroup() {
        return $this->hasMany('App\School_PeerGroup');

    }
}