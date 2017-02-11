<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class UG_CreditHour extends Model
{
    public $table = "ug_credithours";
    protected $fillable=[
        'UG_CreditHours_ID',
        'School_Id',
        'Year',
        'Twelve_Mnt_UG_credit_hrs',
        'Twelve_Mnt_UG_contact_hrs',
        'Twelve_Mnt_PG_credit_hrs',
        'Estimate_FTE_UG_yr',
        'Estimate_FTE_PG_yr',
        'Reported_FTE_UG_yr',
        'Reported_FTE_PG_yr',
        'Reported_FTE_Dr_yr',
        'Inst_Activity_Type',
    ];
    protected $primaryKey = 'UG_CreditHours_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }

}