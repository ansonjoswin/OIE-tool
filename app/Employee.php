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
            'Year',
						'Admin_ProfStaf_Mgmt',
            'Admin_ProfStaf_Busn',
            'Admin_ProfStaf_Comp',
            'Admin_ProfStaf_CmntyServ',
            'Admin_ProfStaf_Healtcr',
            'Admin_ProfStaf_OfcAdmn',
            'NonInstnAcadStaf_Reasrch',
            'NonInstnAcadStaf_PubServ',
            'NonInstnAcadStaf_Library ',
            'InstructionStaff',
            'NonAdmnServStaf_Serv',
            'NonAdmnServStaf_Sales',
            'NonAdmnServStaf_Resource',
            'NonAdmnServStaf_Prod',
            'InstSal_AcadRank',
            'InstSal_SalOtlyTtl',
            'NonInstAcadStafSal_ResrchOtl',
            'NonInstAcadStafSal_PubServOtl',
            'NonInstAcadStafSal_OthrSerOtl',
            'AdmProfStafSal_MgmtOtl',
            'AdmProfStafSal_BusnOtl',
            'AdmProfStafSal_ComEngOtl',
            'AdmProfStafSal_SocServOtl',
            'AdmProfStafSal_TechnicalOtl',
            'NonAdmServStafSal_ServOtl',
            'NonAdmServStafSal_SalOtl',
            'AdmProfStafSal_OfcAdmnOtl',
            'NonAdmServStafSal_ConstrMaintOtl',
            'NonAdmServStafSal_ProdTranOtl',


			];

    //protected $primaryKey = 'E_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }

			public function schools(){
				return $this->belongsTo('App\School');
			}



}
