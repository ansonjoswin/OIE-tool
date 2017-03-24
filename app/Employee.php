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
			'id',
			'school_id',
			'year',
			'admin_profstaff_management',
			'admin_profstaff_business',
			'admin_profstaff_comp',
			'admin_profstaff_comunityservice',
			'admin_profstaff_healthcare',
			'admin_profstaff_ofcadmin',
			'non_instn_acad_staff_research',
			'non_instn_acad_staff_pub_service',
			'non_instn_acad_staff_library',
			'instruction_staff',
			'non_admin_service_staff_service',
			'non_admin_service_staff_sales',
			'non_admin_service_staff_resource',
			'non_admin_service_staff_prod',
			'inst_salary_academic_rank',
			'inst_salary_salaryoutlaytotal',
			'non_inst_acad_staff_salary_research_outlay',
			'non_inst_acad_staff_salary_pubservice_outlay',
			'non_inst_acad_staff_salary_other_outlay',
			'admin_profstaff_salary_mgmt_outlay',
			'admin_profstaff_salary_business_outlay',
			'admin_profstaff_salary_compeng_outlay',
			'admin_profstaff_salary_community_outlay',
			'admin_profstaff_salary_technical_outlay',
			'nonadmin_servicestaffsalary_outlay',
			'nonadmin_servicestaffsalary_salaryoutlay',
			'admin_profstaff_salary_ofcadmin_noutlay',
			'nonadmin_servicestaffsalary_construction_outlay',
			'nonadmin_servicestaffsalary_production_outlay',
			'instructors_per_thousand_student',
			'admin_professional_staff',
			'admin_professionalstaff _perthousandstudent',
			'noninstruction_academicstaff',
			'noninstruction_academicstaff_perthousandstudent',
			'nonadmin_trade_servicestaff',
			'nonadmin_tradeservicestaff_perthousandstudent',
			'all_instructors_staff',
			'instructor_salarypermillion',
			'adminprofessionalstaff_salarypermillion',
			'noninstruction_academicstaff_salarypermillion',
			'nonadmin_tradeservicestaff_salarypermillion',
			];

    protected $primaryKey = 'id';
    public static function getTableName() {
        return (new static)->getTable();
    }

			public function school(){
				return $this->belongsTo('App\School');
			}
}
