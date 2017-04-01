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
            $table->bigIncrements('id');
            $table->integer('school_id')->index();
            $table->integer('year')->index();
            $table->integer('admin_profstaff_management')->nullable();
            $table->integer('admin_profstaff_business')->nullable();
            $table->integer('admin_profstaff_comp')->nullable();
            $table->integer('admin_profstaff_comunityservice')->nullable();
            $table->integer('admin_profstaff_healthcare')->nullable();
            $table->integer('admin_profstaff_ofcadmin')->nullable();
            $table->integer('non_instn_acad_staff_research')->nullable();
            $table->integer('non_instn_acad_staff_pub_service')->nullable();
            $table->integer('non_instn_acad_staff_library')->nullable();
            $table->integer('instruction_staff')->nullable();
            $table->integer('non_admin_service_staff_service')->nullable();
            $table->integer('non_admin_service_staff_sales')->nullable();
            $table->integer('non_admin_service_staff_resource')->nullable();
            $table->integer('non_admin_service_staff_prod')->nullable();
            $table->integer('non_inst_acad_staff_salary_research_outlay')->nullable();
            $table->integer('non_inst_acad_staff_salary_pubservice_outlay')->nullable();
            $table->integer('non_inst_acad_staff_salary_other_outlay')->nullable();
            $table->integer('admin_profstaff_salary_mgmt_outlay')->nullable();
            $table->integer('admin_profstaff_salary_business_outlay')->nullable();
            $table->integer('admin_profstaff_salary_compeng_outlay')->nullable();
            $table->integer('admin_profstaff_salary_community_outlay')->nullable();
            $table->integer('admin_profstaff_salary_technical_outlay')->nullable();
            $table->integer('nonadmin_servicestaffsalary_outlay')->nullable();
            $table->integer('nonadmin_servicestaffsalary_salaryoutlay')->nullable();
            $table->integer('admin_profstaff_salary_ofcadmin_outlay')->nullable();
            $table->integer('nonadmin_servicestaffsalary_construction_outlay')->nullable();
            $table->integer('nonadmin_servicestaffsalary_production_outlay')->nullable();
            $table->integer('instructors_per_thousand_student')->nullable();
            $table->integer('admin_professional_staff')->nullable();
            $table->integer('admin_professionalstaff_perthousandstudent')->nullable();
            $table->integer('noninstruction_academicstaff')->nullable();
            $table->integer('noninstruction_academicstaff_perthousandstudent')->nullable();
            $table->integer('nonadmin_trade_servicestaff')->nullable();
            $table->integer('nonadmin_tradeservicestaff_perthousandstudent')->nullable();
            $table->string('all_instructors_staff')->nullable();
            $table->string('instructor_salarypermillion')->nullable();
            $table->string('adminprofessionalstaff_salarypermillion')->nullable();
            $table->string('noninstruction_academicstaff_salarypermillion')->nullable();
            $table->string('nonadmin_tradeservicestaff_salarypermillion')->nullable();
            $table->unique('school_id', 'year');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->useCurrent();
			      $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            //$table->primary(['school_id']);
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
