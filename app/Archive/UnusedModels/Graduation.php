<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class Graduation extends Model
{
    //
	
	protected $fillable=[
	
	           
            'School_ID',
            'year',
            'X_Rev_BacDgr_CH2006',
            'Rev_BacDgr_CH2006',
            'X_Exl_BacDgr150',
            'Exl_BacDgr150',
            'X_Adj_BacDgr150',
            'Adj_BacDgr150',
            'X_ComCNT_Bac_D100_4yr',
            'ComCNT_Bac_D100_4yr',
            'X_GradRate4yr_BacDgr100',
            'GradRate4yr_BacDgr100',
            'X_ComCNT_Bac_D150_4yr',
            'ComCNT_Bac_D150_4yr',
            'X_ComCNT_Bac_D150_6yr',
            'ComCNT_Bac_D150_6yr',
            'X_GradRate6yr_BacDgr150',
            'GradRate6yr_BacDgr150',
            'X_AdnExl_BacDgrCH',
            'AdnExl_BacDgrCH',
            'X_Adj_BacDgr200',
            'Adj_BacDgr200',
            'X_ComCNT_BD150&200',
            'ComCNT_BD150&200',
            'X_StEnrl',
            'StEnrl',
            'X_ComCNT_BD200_8yr',
            'ComCNT_BD200_8yr',
            'X_GradRate8yr_BD200',
            'GradRate8yr_BD200',
            'X_RevDgr_CerCH2010',
            'RevDgr_CerCH2010',
            'X_ExlDgr_Cer150',
            'ExlDgr_Cer150',
            'X_AdjDgr_Cer150',
            'AdjDgr_Cer150',
            'X_ComCNT_DgrCer100',
            'ComCNT_DgrCer100',
            'X_GradRate_DgrCer100',
            'GradRate_DgrCer100',
            'X_ComCNT_DgrCer150',
            'ComCNT_DgrCer150',
            'X_GradRate_DgrCer150',
            'GradRate_DgrCer150',
            'X_AdnExl_DgrCer',
            'AdnExl_DgrCer',
            'X_Adj_DgrCer200',
            'Adj_DgrCer200',
            'X_ComCNT_DgrCer50&200',
            'ComCNT_DgrCer50&200',
            'X_StEnr',
            'StEnr',
            'X_ComCNT_DgrCer200',
            'ComCNT_DgrCer200',
            'X_GradRate_DgrCer200',
            'GradRate_DgrCer200',
        ];

    protected $primaryKey = 'Graduation_ID';
    public static function getTableName() {
        return (new static)->getTable();
    }
		
		 public function schools() {
            return $this->belongsTo('App\School');

      }

}
