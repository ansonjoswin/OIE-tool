<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;


class ApplicationDetail extends Model
{   public $table = "applicationdetails";
       protected $fillable=[	
            'year',
            'School_Id',
            'SecSchGPA',
            'SecSchRank',
            'SecSchRec',
            'CmplClgPrepPgm',
            'Recommendations',
            'FrmDemCompt',
            'AdmTestSrc',
            'TOEFL_Src',
            'OtherTest_Src',
            'Num_1stTime_Dgr_CerSubSATscr',           
            'Per_1stTime_Dgr_CerSubSATscr',           
            'Num_1stTime_Dgr_CerSubACTscr',           
            'Per_1stTime_Dgr_CerSubACTscr',            
            'SAT_Rdg25PS',          
            'SAT_Rdg75PS',           
            'SAT_Math25PS',           
            'SAT_Math75PS',          
            'SAT_Wrt25PS',       
            'SAT_Wrt75PS',           
            'ACT_Comp25PS',         
            'ACT_Comp5PS',          
            'ACT_Eng25PS',         
            'ACT_Eng75PS',           
            'ACT_Math25PS',          
            'ACT_Math75PS',          
            'ACT_Wrt25PS',           
            'ACT_Wrt75PS',           

    ];

	protected $primaryKey = 'Application_ID';
	public static function getTableName() {
        return (new static)->getTable();
    }
	
    public function school() {
        return $this->belongsTo('App\School');
    }
}
