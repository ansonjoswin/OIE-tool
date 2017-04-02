<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTable extends Model
{
    //
    public $table = "datatable";
    protected $fillable=[
    		'id',
            'school_id',
            'year' ,
            'school_name',
            'instruction_staff' ,
            'instructors_per_thousand_student' ,
            'admin_professional_staff' ,
            'admin_professionalstaff_perthousandstudent' ,
            'noninstruction_academicstaff',
            'noninstruction_academicstaff_perthousandstudent' ,
            'nonadmin_trade_servicestaff' ,
            'nonadmin_tradeservicestaff_perthousandstudent',
            'all_instructors_staff',
            'ug_student_perthousandstudent',
            'instructor_salarypermillion',
            'adminprofessionalstaff_salarypermillion',
            'noninstruction_academicstaff_salarypermillion',
            'nonadmin_tradeservicestaff_salarypermillion',
            'ug_average_sch_studentperay',
            'grad_average_sch_studentperay',
            'ug_degrees_perthousand_ugstudent',
            'ug_certi_perthousand_ugstudent',
            'graddegree_perhundredgradstudent',
            'grad_certi_perhundred_gradstudent',
            'bachelordegree_4yeargradrate',
            'bachelordegree_6yeargradrate',
<<<<<<< HEAD
            'associatedegree_certi3yeargradrate'

=======
            'associatedegree_certi3yeargradrate',
            'loan_default_rate'
>>>>>>> 754bc367df9400c202fec53ac8160905187f4959
            ];
    protected $primaryKey = 'id';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function school(){
        return $this->belongsTo('App\DataTable');
    }
}

