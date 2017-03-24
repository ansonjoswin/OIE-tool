<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateParametersView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW parameters as
 select stu.school_id,
stu.year,
stu.ug_student_perthousandstudent,
            stu.ug_average_sch_studentperay,
            stu.grad_average_sch_studentperay,
            stu.ug_degrees_perthousand_ugstudent,
            stu.ug_certi_perthousand_ugstudent,
            stu.graddegree_perthousandgradstudent,
            stu.grad_certi_perthousand_gradstudent,
            stu.bachelordegree_4yeargradrate,
            stu.bachelordegree_6yeargradrate,
            stu.associatedegree_certi3yeargradrate,
emp.instructors_per_thousand_student,
            emp.admin_professional_staff,
            emp.admin_professionalstaff_perthousandstudent,
            emp.noninstruction_academicstaff,
            emp.noninstruction_academicstaff_perthousandstudent,
            emp.nonadmin_trade_servicestaff,
            emp.nonadmin_tradeservicestaff_perthousandstudent,
            emp.all_instructors_staff,
            emp.instructor_salarypermillion,
            emp.adminprofessionalstaff_salarypermillion,
            emp.noninstruction_academicstaff_salarypermillion,
            emp.nonadmin_tradeservicestaff_salarypermillion,
			fin.public_total_salary_wage,
			fin.privateprofit_total_salary_wage,
			fin.private_nonprofit_total_salary_wage,
			dr.default_rate1,
			dr.default_rate2,
			dr.default_rate3
			
from students stu, employees emp, schools sc,finances fin, defaultrates dr where stu.school_id=sc.id and emp.school_id=sc.id and stu.year=emp.year and fin.school_id=sc.id and dr.opeid=sc.opeid and emp.year=fin.year and fin.year=dr.year");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement( 'DROP VIEW parameters' );
    }
}
