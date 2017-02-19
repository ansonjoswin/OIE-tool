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

            'School_ID',
            'State_Desc',
            'year',
            'Program_Length',
            'Sch_Type',
            'EthnicCode',
            'CongDis',
            'Region',
            'AvgOrGrtTh30',
            'RateType',
            'Cohort_Year',
            'NumBorDeft',
            'NumBorRpy',
            'DefRate',
            'Prate',
            'School_State',
			
	];

	protected $primaryKey = 'OPE_ID';
	public $incrementing = false;
	
    public function school() {
        return $this->belongsTo('App\School');
    }
}