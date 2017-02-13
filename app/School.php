<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class School extends Model
{
    protected $fillable=[
    'School_Id',
    'Unit_Id',
    'School_Name',
    'School_Address',
    'School_City',
    'School_State',
    'School_Zip',
    'School_St_FIPS',
    'School_GeoLoc',
    'Admin_Name',
    'Admin_Title',
    'School_TelNum',
    'EmpID',
    'OPE_ID',
    'OPE_Flag',
    'SchoolURL',
    'AdmissionURL',
    'FinanceURL',
    'OnlineAppURL',
    'NetPrice_CalcURL',
    'VetURL',
    'AuthURL',
    'School_Sector',
    'School_Level',
    'School_Control',
    'HL_Offering',
    'UG_Offering',
    'Grad_Offering',
    'HD_Offered',
    'Deg_GrantStat',
    'Hist_BlkColg',
    'Hospital',
    'Inst_MedicalDeg',
    'TribalClg',
    'Deg_Urban',
    'OpenPublic',
    'MergedSchool_UNITID',
    'School_Status',
    'IPEDS_DeleteYr',
    'School_ClosedDt',
    'CurrentYr_Active',
    'PostSec_Indicator',
    'PostSec_InstIndicator',
    'PostSec_4InstIndicator',
    'Rpt_Method',
    'Inst_NameAlias',
    'Inst_Category',
    'Land_GrandInst',
    'Inst_SizeCategory',
    'CBSA',
    'CBSA_Type',
    'Combined_StatArea',
    'NewEng_CityTown',
    'MultiInst',
    'MultiInst_Name',
    'MultiInst_ID',
    'Fips_CtyCode',
    'School_Country',
    'Cogressional_DistCode',
    'GeoLongitude',
    'GeoLatitude',
];
    protected $primaryKey = 'School_Id';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function ug_unduplicatedheadcount()
    {
        return $this->hasMany('App\UG_UnduplicatedHeadCount');

    }
    public function ug_credithour()
    {
        return $this->hasMany('App\UG_CreditHour');

    }
    public function admission()
    {
        return $this->hasMany('App\Admission');

    }
}

