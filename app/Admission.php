<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class Admission extends Model
{
    protected $fillable=[
        'Admission_ID',
        'year',
        'School_Id',
        'Ttl_Apl',
        'Ttl_Admn',
        'Ttl_FTEnr',
        'Ttl_PTEnr',
        'Ttl_Enr',
        'FemaleAplCNT',
        'MaleAdmnCNT',
        'FemaleAdmnCNT',
        'MEnrCNT',
        'FEnrCNT',
        'MEnrFT',
        'FEnrFT',
        'MEnrPT',
        'FEnrPT',
        'FT_CRSCohort',
        'FT_Fall2013',
        'Excl_FT_Fall2013',
        'FT_Adj_Fall2013',
        'FT_AdjFall2013_EnrFall2014',
        'FT_RetRate2014',
        'PT_Fall2013',
        'Excl_PT_Fall2013',
        'PT_Adj_Fall2013',
        'PT_AdjFall2013_EnrFall2014',
        'PT_RetRate2014',
        'TtlEnterinStd_UG',
        'Grp_CmpCat_Rpt',
        'Data_FbRpt',
        'Std_Fac',

    ];
    protected $primaryKey = 'Admission_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }
}

