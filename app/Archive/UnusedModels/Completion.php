<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class Completion extends Model
{
    //
    public $table = "completions";
	protected $fillable=[

            'School_Id',
            'year',
            'InsPgCode',
            'MajNum',
            'AwardLvl',
            'GrandTotal',
            'Ttl_M',
            'Ttl_W',
            'TtlAmeInd_AlsNat',
            'Ttl_M_AmeInd_AlsNat',
            'Ttl_W_AmeInd_AlsNat',
            'TtlAsian',
            'Ttl_M_Asian',
            'Ttl_W_Asian',
            'Ttl_AfrAme',
            'Ttl_W_AfrAme',
            'TtlHisLat',
            'Ttl_M_His_Lat',
            'Ttl_NaHwn_PacIsd',
            'Ttl_M_NaHwn_PacIsd',
            'Ttl_W_NaHwn_PacIsd',
            'Ttl_White',
            'Ttl_M_White',
            'Ttl_W_White',
            'Ttl_TwoorMoreRaces',
            'Ttl_M_TwoorMoreRaces',
            'Ttl_W_TwoorMoreRaces',
            'Ttl_RaceUnknown',
            'Ttl_M_RaUn',
            'Ttl_W_RaUn',
            'Ttl_alien',
            'Ttl_M_alien',
            'Ttl_W_alien',
            
            
    ];

    protected $primaryKey = 'Completion_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }
	

    public function schools() {
            return $this->belongsTo('App\School');

      }


}


