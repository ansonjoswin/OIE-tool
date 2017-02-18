<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class Private_NProf extends Model
{
    public $table = "private_nprofs";
    protected $fillable=[
        //'PrivateNProf_ID',
        'Finance_ID',
        'TtlUnRestAss',
        'TtlRestAss',
        'PermRestrcAsstltAss',
        'TmpRestrcAss',
        'L_improvements_EndYr',
        'Buildings_EndYr',
        'EquipmentArtLib_EndYr',
        'SpecChangeAss',
        'TtlChangeAss',
        'Ass_BegnYr',
        'TtlPlantPropEquip',
        'AdjBegnYrAss',
        'Ass_endYr',
        'LclGrnt',
        'InstGrnt_Funded',
        'InstGrnt_Unfunded',
        'TuFee_Ttl',
        'TuFee_UnRest',
        'TuFee_TmpRest',
        'TuFee_PermRest',
        'FedAppro_Ttl',
        'FedAppro_UnRest',
        'FedAppro_TmpRest',
        'FedAppro_PermRest',
        'StAppro_Ttl',
        'StAppro_UnRest',
        'StAppro_TmpRest',
        'StAppro_PermRest',
        'LclAppro_Ttl',
        'LclAppro_UnRest',
        'LclAppro_TmpRest',
        'LclAppro_PermRest',
        'FedGrntCntrc_Ttl',
        'FedGrntCntrc_UnRest',
        'FedGrntCntrc_TmpRest',
        'FedGrntCntrc_PemRest',
        'StGrntCntrc_Ttl',
        'StGrntCntrc_UnRest',
        'StGrntCntrc_TmpRest',
        'StGrntCntrc_PermRest',
        'LclGrntCntrc_Ttl',
        'LclGrntCntrc_UnRest',
        'LclGrntCntrc_TmpRest',
        'LclGrntCntrc_PermRest',
        'PrvGfts_GrntCntrc_Ttl',
        'PrvGftsGrntCntrc_UnRest',
        'PrvGftsGrntCntrc_TmpRest',
        'PrvGftsGrntCntrc_PermRest',
        'PrvGfts_Ttl',
        'PrvGfts_UnRest',
        'PrvGfts_TmpRest',
        'PrvGfts_PermRest',
        'PrvGrnt_contrants_Ttl',
        'PrvGrntCntrc_UnRest',
        'PrvGrntCntrc_TmpRest',
        'PrvGrntCntrc_PermRest',
        'ContriAfflEnt_Ttl',
        'ContriAfflEnt_UnRest',
        'ContriAfflEnt_TmpRest',
        'ContriAfflEnt_PermRest',
        'InvesRet_Ttl',
        'InvesRet_UnRest',
        'InvesRet_TmpRest',
        'InvesRet_PermRest',
        'Sales_ServEducalAct_Ttl',
        'Sales_ServEducalAct_UnRest',
        'Sales_ServAuxEntp_Ttl',
        'Sales_ServAuxEntp_UnRest',
        'HospRev_Ttl',
        'HospRev_UnRest',
        'IndpOpsRev_Ttl',
        'IndpOpsRev_UnRest',
        'IndpOpsRev_TmpRest',
        'IndpOpsRev_PermRest',
        'OthRev_Ttl',
        'HsptlSrvcsOprMaintPlant',
        'OthRev_UnRest',
        'OthRev_TmpRest',
        'OthRev_PermRest',
        'TtlRevs_InvesRet_Ttl',
        'TtlRevs_InvesRet_UnRest',
        'TtlRevsInvesRetTmpRest',
        'TtlRevsInvesRetPermRest',
        'AssRest_Ttl',
        'AssRest_UnRest',
        'AssRest_TmpRest',
        'AssRest_PermRest',
        'TtlRevs_AftrAssRest_Ttl',
        'TtlRevs_AftrAssRest_UnRest',
        'TtlRevs_AftrAssRest_TmpRest',
        'TtlRevs_AftrAssRest_PermRest',
        'IndpOps_TtlAmt',
        'IndpOps_Sal_wages',
        'IndpOps_Benft',
        'IndpOps_Oprtn_MaintPlant',
        'IndpOps_Deprctn',
        'IndpOps_Interest',
        'IndpOps_AllOth',
        'TtlExpns_Oprtn_MaintPlant',

    ];
    protected $primaryKey = 'PrivateNProf_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }
}

