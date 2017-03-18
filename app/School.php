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
    'UNITID',
    'Name',
           'Address',
           'City',
           'State',
            'Zip',
            'FIPS_StateCode',
            'GeoLocation',
           'Admin_Name',
           'Admin_Title',
            'TelephoneNumber',
            'EmpID',
            'OPEID',
            'OPE_Flag',
           'SchoolURL',
           'AdminURL',
           'FinanceURL',
           'OnlineAppURL',
           'NetPriceCalcURL',
           'VeteransURL',
           'AthleteGraduationRateURL',
            'Sector',
            'InstitutionLevel',
            'InstitutionControl',
            'HighestLevelOffering',
            'UG_Offering',
            'Grad_Offering',
            'HighestDegreeOffered',
            'DegreeGrantingStatus',
            'HistoricalBlackColg',
            'Hospital',
            'GrantMedicalDegree',
            'TribalColg',
            'DegreeOfUrbanization',
            'OpenToPublic',
            'MergedSchoolUNITID',
            'Status',
            'YearOfDeletion_IPEDS',
            'ClosedDate',
            'CurrentYr_Active',
            'PostSecIndicator',
            'PostSecInstIndicator',
            'PostSecTitle4InstIndicator',
            'ReportingMethod',
           'InstituteNameAlias',
            'InstituteCategory',
            'LandGrandInstitution',
            'InstituteSizeCategory',
            'CBSA',
            'CBSA_Type',
            'CombinedStasticalArea',
            'NewEnglandCityTownArea',
            'MultiInst',
           'MultiInst_Name',
            'MultiInst_ID',
            'FipsCountyCode',
           'CountyName',
            'CogressionalDistCode',
            'GeoLongitude',
            'GeoLatitude',
			'DataFeedbkReprtByNCES',
            'DataFeedbkReprtCustmGrp'
];
    protected $primaryKey = 'ID';

    public static function getTableName() {
        return (new static)->getTable();
    }


    public function completion()
    {
        return $this->hasMany('App\Completion');

    }
    public function peergroup()
    {
        return $this->belongsToMany('App\PeerGroup');

    }
    public function user()
    {
        return $this->hasMany('App\User');

    }
    public function graduation()
    {
        return $this->hasMany('App\Graduation');

    }
  
    /*public function user()
    {
        return $this->hasMany('App\User');

    } */


    public function employee()
    {
        return $this->hasMany('App\Employee');

    }

    public function carneige_classification()
    {
        return $this->hasOne('App\Carneige_classification');

    }

    public function finance()
    {
        return $this->hasOne('App\FInance');

    }


}

