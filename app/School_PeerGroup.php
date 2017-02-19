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
    protected $fillable=[

        'School_ID',
        'PeerGroupID',

    ];
    protected $primaryKey = ['School_ID','PeerGroupID'];

    public function peergroup() {
        return $this->belongsTo('App\PeerGroup');
    }

    public function school() {
        return $this->hasMany('App\School');

    }
}