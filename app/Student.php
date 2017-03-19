<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;


class Student extends Model
{
    use HasCompositePrimaryKey;
    protected $fillable=[
        //'Admission_ID',
        'school_id',
     'year',
    'total_studentcount_1',
    'undrgradstudentcount_2',
    'gradstudentcount_4',
    'inst_act_ugcredit_hrs',
    'inst_act_gradcredit_hrs',
    'inst_activity_type',
    'under_certi_award_level1',
    'grad_certi_award_level6',
    'under_degree_award _level3',
    'grad_degree_award_level7',
    'cohort_status13',
    'cohort_status15',
    'cohort_status8',
    'cohort_status30',
    'cohort_status29',
    'ug_student_perthousandstudent',
    'ug_average_sch_studentperay',
    'grad_average_sch_studentperay',
    'ug_degrees_perthousand_ugstudent',
    'ug_certi_perthousand_ugstudent',
    'graddegree_perthousandgradstudent',
    'grad_certi_perthousand_gradstudent',
    'bachelordegree_4yeargradrate',
    'bachelordegree_6yeargradrate',
    'associatedegree_certi3yeargradrate',

    ];

    protected $primaryKey = ['school_id', 'year'];
    //protected $primaryKey = 'school_id';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school() {
        return $this->belongsTo('App\School');
    }
}
