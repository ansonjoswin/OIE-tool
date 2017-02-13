<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class Private_Prof extends Model
{
    public $table = "private_profs";
    protected $fillable=[
        'PrivateProf_ID',
        'Finance_ID',
        'TtlEquity',
        'TtlLiab_Equity',
        'Land_landImprov',
        'Buildings',
        'EquipmentArt_LibCollec',
        'NetOfAcmltdDeprctn',
        'SumOfSpecChangEquity',
        'NetIncm',
        'OtherChangesEquity',
        'Equity_BegnOfYr',
        'AdjstmntsBegnNetEquity',
        'Equity_endOfYr',
        'State_LclGrnt',
        'LclGovtGrnt',
        'InstitutionalGrnt',
        'Tuition_fees',
        'FedrlApprop_Grnt_Contrcs',
        'FedrlGrnt_Contrcs',
        'StateLclAppropGrntContrcs',
        'StateGrntContrcs',
        'LclGovtApprop',
        'LclGovtContrcs',
        'PrivateGftsGrntContrcs',
        'InvIncNetInc',
        'HospRev',
        'OtherRev',
        'FedInc_TaxExp',
        'State_LclIncmTaxExpns',
        'DesignPaidReprtTaxExpns',


    ];
    protected $primaryKey = 'PrivateProf_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }

}
