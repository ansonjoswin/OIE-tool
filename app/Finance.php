<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class Finance extends Model
{
    protected $fillable=[
        //'Finance_ID',
        'School_ID',
        'year',
        'Sector_Flag',
        'TtlNetAssets',
        'OwnEndowAsst',
        'ValEndowAsstBegnFisclYr',
        'ValEndowAsstEndFisclYr',
        'TtlAsst',
        'TtlLiabilts',
        'ConstProg',
        'OthrPlantPropEquip',
        'TtlPlantPropEquip',
        'AccuDepre',
        'PropPlantEquip_netAcumltdDpr',
        'IntAsstNetAcmltdAmor',
        'TtlRevInvReturn',
        'TtlExpns',
        'PellGrnt',
        'StateGrnt',
        'TtlStudGrant',
        'AllwncApplTut_fees',
        'AllwncAplAux_EntRev',
        'InstrcTtlAmt',
        'InstrcSal_wages',
        'InstrcBenefits',
        'InstrcOprMaintPlant',
        'InstrcDep',
        'InstrcInterest',
        'InstrcAllOthr',
        'RsrchTtlAmt',
        'RsrchSal_wages',
        'RsrchBenefits',
        'RsrchOprMaintPlant',
        'RsrchDep',
        'RsrchInterest',
        'RsrchAllOthr',
        'PubSrvcTtlAmnt',
        'PubSrvcSal_wages',
        'PubSrvcBenefits',
        'PubSrvcOprMaintPlant',
        'PubSrvcDep',
        'PubSrvcInt',
        'PubSrvcAllOthr',
        'AcadSuprtTtlAmnt',
        'AcadSuprtSal_wage',
        'AcadSuprtBenefits',
        'AcadSuprtOprMaintPlant',
        'AcadSuprtDep',
        'AcadSuprtInterest',
        'AcadSuprtAllOthr',
        'StudSrvcTtlAmt',
        'StudSrvcSal_Wages',
        'StudSrvcBenefits',
        'StudSrvcOprMaintPlant',
        'StudSrvcDep',
        'StudSrvcInterest',
        'StudSrvcAllOthr',
        'InstSprtTtlAmt',
        'InstSprtSal_wages',
        'InstSprtBenefits',
        'InstSprtOprMaintPlant',
        'InstSprtDepreciation',
        'InstSprtInterest',
        'InstSprtAllOthr',
        'AuxEntrpTtlAmt',
        'AuxEntrpSal_wages',
        'AuxEntrpBenefits',
        'AuxEntrpOprMaintPlant',
        'AuxEntrpDep',
        'AuxEntrpInterest',
        'AuxEntrpAllOthr',
        'Net_grantAid_StudsTtlAmt',
        'Net_grantAid_StudsAllOthr',
        'HsptlSrvcsTtlAmnt',
        'HsptlSrvcsSalWage',
        'HsptlSrvcsBenefits',
        'HsptlSrvcsOprMaintPlant',
        'HsptlSrvcsDep',
        'HsptlSrvcsInt',
        'HsptlSrvcsAllOthr',
        'OprMaintPlantTtlAmt',
        'OprMaintPlantSal_wages',
        'OprMaintPlantBenefits',
        'OprMaintPlantOprMaintPlant',
        'OprMaintPlantDep',
        'OprMaintPlantInt',
        'OprMaintPlantAllOthr',
        'OthrExpnsTtlAmnt',
        'OthrExpnsSal_wages',
        'OthrExpnsBenefits',
        'OthrExpnsOprMaintPlant',
        'OthrExpnsDprctn',
        'OthrExpnsIntrst',
        'OthrExpnsAlOthr',
        'TtlExpnsTtlAmnt',
        'TtlExpnsSlrWages',
        'TtlExpnsBnfits',
        'TtlExpnsDprctn',
        'TtlExpnsIntrst',
        'TtlExpnsAllOthr',
        'OthrfederlGrnt',
        'FedApp',
        'StApp',
        'Sale_SrvcsEductnActv',
        'Sales_SrvcsAuxEntrp',

    ];
    protected $primaryKey = 'Finance_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }
}

