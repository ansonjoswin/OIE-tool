<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class Instructional_ES extends Model
{
    //
	protected $table = 'Instructional_ESS';
	
	protected $fillable=[
	
	          
            'School_ID',
            'year',
            'Acad_Rank',
            'X_Crt_Dur_Ttl',
            'Crt_Dur_Ttl',
            'X_Crt_Dur_M',
            'Crt_Dur_M',
            'X_Crt_Dur_W',
            'Crt_Dur_W',
            'X_Crt_Dur_9mnth_Ttl',
            'Crt_Dur_9mnth_Ttl',
            'X_Crt_Dur_9mnth_M',
            'Crt_Dur_9mnth_M',
            'X_Crt_Dur_9mnth_W',
            'Crt_Dur_9mnth_W',
            'X_Crt_Dur_10mnth_Ttl',
            'Crt_Dur_10mnth_Ttl',
            'X_Crt_Dur_10mnth_M',
            'Crt_Dur_10mnth_M',
            'X_Crt_Dur_10mnth_W',
            'Crt_Dur_10mnth_W',
            'X_Crt_Dur_11mnth_Ttl',
            'Crt_Dur_11mnth_Ttl',
            'X_Crt_Dur_11mnth_M',
            'Crt_Dur_11mnth_M',
            'X_Crt_Dur_11mnth_W',
            'Crt_Dur_11mnth_W',
            'X_Crt_Dur_12mnth_Ttl',
            'Crt_Dur_12mnth_Ttl',
            'X_Crt_Dur_12mnth_M',
            'Crt_Dur_12mnth_M',
            'X_Crt_Dur_12mnth_W',
            'Crt_Dur_12mnth_W',
            'X_Sal_Outlay_dur_Ttl',
            'Sal_Outlay_dur_Ttl',
            'X_Sal_Outlay_dur_M',
            'Sal_Outlay_dur_M',
            'X_Sal_Outlay_dur_W',
            'Sal_Outlay_dur_W',
            'X_Sal_Outlays_Ttl',
            'Sal_Outlays_Ttl',
            'X_Sal_Outlays_M',
            'Sal_Outlays_M',
            'X_Sal_Outlays_W',
            'Sal_Outlays_W',
            'X_Avg_Wgt_Mth_Sal_Ttl',
            'Avg_Wgt_Mth_Sal_Ttl',
            'X_Avg_Wgt_Mth_Sal_M',
            'Avg_Wgt_Mth_Sal_M',
            'X_Avg_Wgt_Mth_Sal_W',
            'Avg_Wgt_Mth_Sal_W',
 
        ];

    protected $primaryKey = 'InstructionalES_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }
			
		public function schools() {
            return $this->belongsTo('App\School');

      }


}	
			
