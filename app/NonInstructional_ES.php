<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class NonInstructional_ES extends Model
{
    //
	
	protected $table = 'NonInstructional_ESS';
	
	protected $fillable=[

            'School_ID',
            'year',
            'X_FT_NIns_StNum',
            'FT_NIns_StNum',
            'X_FT_NIns_StOutlays',
            'FT_NIns_StOutlays',
            'X_ResNum',
            'ResNum',
            'X_ResOutlays',
            'ResOutlays',
            'X_Pub_SerNum',
            'Pub_SerNum',
            'X_Pub_SerOutlays',
            'Pub_SerOutlays',
            'X_LibCurArc_AcaAff_OtEduSerNum',
            'LibCurArc_AcaAff_OtEduSerNum',
            'X_LibCurArc_AcaAff_OtEduSerNumOutlays',
            'LibCurArc_AcaAff_OtEduSerNumOutlays',
            'X_MgnNum',
            'MgnNum',
            'X_MgnOutlays',
            'MgnOutlays',
            'X_BusFn_OpNum',
            'BusFn_OpNum',
            'X_BusFn_OpOutlays',
            'BusFn_OpOutlays',
            'X_ComEng_SciNum',
            'ComEng_SciNum',
            'X_ComEng_SciOutlays',
            'ComEng_SciOutlays',
            'X_ComSoc_SerLegArt_DesEntSptMedNum',
            'ComSoc_SerLegArt_DesEntSptMedNum',
            'X_ComSoc_SerLegArt_DesEntSptMedOly',
            'ComSoc_SerLegArt_DesEntSptMedOly',
            'X_HC_PracTecNum',
            'HC_PracTecNum',
            'X_HC_PracTecOutlays',
            'HC_PracTecOutlays',
            'X_SerNum',
            'SerNum',
            'X_SerOutlays',
            'SerOutlays',
            'X_SalReNum',
            'SalReNum',
            'X_SalReOutlays',
            'SalReOutlays',
            'X_OffAdmn_SupNum',
            'OffAdmn_SupNum',
            'X_OffAdmn_SupOutlays',
            'OffAdmn_SupOutlays',
            'X_NatResConstMaintNum',
            'NatResConstMaintNum',
            'X_NatResConstMaintOutlays',
            'NatResConstMaintOutlays',
            'X_ProdTran_MatMoNum',
            'ProdTran_MatMoNum',
            'X_ProdTran_MatMoOutlays',
            'ProdTran_MatMoOutlays',

			];

    protected $primaryKey = 'NonInstructionalES_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }
			
			public function schools() {
            return $this->belongsTo('App\School');
			}

}

