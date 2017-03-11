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
            'created_by',
    ];

    protected $primaryKey = 'PeerGroupID';
    public static function getTableName() {
        return (new static)->getTable();
    }
	
    public function user() {
        return $this->belongsTo('User');
    }
	
	public function school_peergroups()
    {
        return $this->hasMany('App\School_PeerGroup', 'PeerGroupID', 'PeerGroupID');
    }

    /**
     * Get a List of school_peergroup ids associated with the current peergroup.
     *
     * @return array
     */
    public function getSchoolPeerGroupIDAttribute()
    {
        return $this->school_peergroups->pluck('schoolpeergroupid');
    }
}