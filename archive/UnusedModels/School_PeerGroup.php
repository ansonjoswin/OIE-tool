<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class School_PeerGroup extends Model
{
    public $table = "school_peergroups";

    protected $fillable=[

        'School_ID',
        'PeerGroupID',

    ];
    protected $primaryKey = ['School_ID','PeerGroupID'];

    public function peergroup() {
        return $this->belongsTo('App\PeerGroup', 'PeerGroupID', 'PeerGroupID');
    }
    //EHLbug: syntax should be: return $this->belongsTo('App\<parent model>', 'foreign_key', 'other_key');

    public function schools() {
        return $this->hasMany('App\School', 'school_id', 'school_id');

    }

    /**
     * Get a List of school ids associated with the current school_peergroup.
     *
     * @return array
     */
//    public function getSchoolIDAttribute()
//    {
//        return $this->schools->pluck('school_id');  //EHLbug: will need to change to 'id' once db team completes new migration
//    }

}