<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class Employee extends Model
{
    //
	
	protected $fillable=[
	
	            
            'School_ID',
            'year',
            'Occup_FullTime_and_PartTime',
            'FullTime_or_PartTime_status',
            'Occup_Catgry',
            'PrevCode_Occup',
            'Emp_Ttl',
            'Emp_Ttl_M',
            'Emp_Ttl_W',
            'Emp_Amer-Ind_or_Alaska_Ttl',
            'Emp_Amer-Ind_or_Alaska_M',
            'Emp_Amer-Ind_or_Alaska_W',
            'Emp_Asian_Ttl',
            'Emp_Asian_M',
            'Emp_Asian_W',
            'Emp_Blk_or_Afro_American_Ttl',
            'Emp_Blk_or_Afro_American_M',
            'Emp_Blk_or_Afro_American_W',
            'Emp_Hispo_or_Latino_Ttl',
            'Emp_Hispo_or_Latino_M',
            'Emp_Hispo_or_Latino',
            'Emp_Haw_or_Pacific_Ttl',
            'Emp_Haw_or_Pacific_M',
            'Emp_Haw_or_Pacific_W',
            'Emp_White_Ttl',
            'Emp_White_M',
            'Emp_White_W',
            'Emp_Two_or_more_race_Ttl',
            'Emp_Two_or_more_race_M',
            'Emp_Two_or_more_race_W',
            'Emp_Race_unknown_Ttl',
            'Emp_Race_unknown_Ttl_M',
            'Emp_Race_unknown_Ttl_W',
            'Emp_Nonresident_Alien_Ttl',
            'Emp_Nonresident_Alien_Ttl_M',
            'Emp_Nonresident_Alien_Ttl_W',
			
			];

    protected $primaryKey = 'E_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }
			
			public function schools(){
				return $this->belongsTo('App\School');
			}
       

	
}
