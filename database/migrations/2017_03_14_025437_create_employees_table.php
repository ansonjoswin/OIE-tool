<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            // Employee Table Attributes
            $table->integer('school_id')->unsigned();
            $table->integer('year')->index();
            $table->float('admin_profstaff_management')->nullable();
            $table->float('admin_profstaff_business')->nullable();
            $table->float('admin_profstaff_comp')->nullable();
            $table->float('admin_profstaff_comunityservice')->nullable();
            $table->float('admin_profstaff_healthcare')->nullable();
            $table->float('admin_profstaff_ofcadmin')->nullable();
            $table->float('non_instn_acad_staff_research')->nullable();
            $table->float('non_instn_acad_staff_pub_service')->nullable();
            $table->float('non_instn_acad_staff_library')->nullable();
            $table->float('instruction_staff')->nullable();
            $table->float('non_admin_service_staff_service')->nullable();
            $table->float('non_admin_service_staff_sales')->nullable();
            $table->float('non_admin_service_staff_resource')->nullable();
            $table->float('non_admin_service_staff_prod')->nullable();
            $table->float('inst_salary_academic_rank')->nullable();
            $table->float('inst_salary_salaryoutlaytotal')->nullable();
            $table->float('non_inst_acad_staff_salary_research_outlay')->nullable();
            $table->float('non_inst_acad_staff_salary_pubservice_outlay')->nullable();
            $table->float('non_inst_acad_staff_salary_other_outlay')->nullable();
            $table->float('admin_profstaff_salary_mgmt_outlay')->nullable();
            $table->float('admin_profstaff_salary_business_outlay')->nullable();
            $table->float('admin_profstaff_salary_compeng_outlay')->nullable();
            $table->float('admin_profstaff_salary_community_outlay')->nullable();
            $table->float('admin_profstaff_salary_technical_outlay')->nullable();
            $table->float('nonadmin_servicestaffsalary_outlay')->nullable();
            $table->float('nonadmin_servicestaffsalary_salaryoutlay')->nullable();
            $table->float('admin_profstaff_salary_ofcadmin_noutlay')->nullable();
            $table->float('nonadmin_servicestaffsalary_construction_outlay')->nullable();
            $table->float('nonadmin_servicestaffsalary_production_outlay')->nullable();
            $table->float('instructors_per_thousand_student')->nullable();
            $table->float('admin_professional_staff')->nullable();
            $table->float('admin_professionalstaff_perthousandstudent')->nullable();
            $table->float('noninstruction_academicstaff')->nullable();
            $table->float('noninstruction_academicstaff_perthousandstudent')->nullable();
            $table->float('nonadmin_trade_servicestaff')->nullable();
            $table->float('nonadmin_tradeservicestaff_perthousandstudent')->nullable();
            $table->float('all_instructors_staff')->nullable();
            $table->float('instructor_salarypermillion')->nullable();
            $table->float('adminprofessionalstaff_salarypermillion')->nullable();
            $table->float('noninstruction_academicstaff_salarypermillion')->nullable();
            $table->float('nonadmin_tradeservicestaff_salarypermillion')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['school_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
