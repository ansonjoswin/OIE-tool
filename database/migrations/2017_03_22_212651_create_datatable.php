<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatatable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatable', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->integer('school_id')->index();
            $table->integer('year')->index();
            $table->string('school_name');
            $table->integer('instruction_staff')->nullable();
            $table->integer('instructors_per_thousand_student')->nullable();
            $table->integer('admin_professional_staff')->nullable();
            $table->integer('admin_professionalstaff_perthousandstudent')->nullable();
            $table->integer('noninstruction_academicstaff')->nullable();
            $table->integer('noninstruction_academicstaff_perthousandstudent')->nullable();
            $table->integer('nonadmin_trade_servicestaff')->nullable();
            $table->integer('nonadmin_tradeservicestaff_perthousandstudent')->nullable();
            $table->string('all_instructors_staff')->nullable();
            $table->integer('ug_student_perthousandstudent')->nullable();
            $table->string('instructor_salarypermillion')->nullable();
            $table->string('adminprofessionalstaff_salarypermillion')->nullable();
            $table->string('noninstruction_academicstaff_salarypermillion')->nullable();
            $table->string('nonadmin_tradeservicestaff_salarypermillion')->nullable();
            $table->double('ug_average_sch_studentperay')->nullable();
            $table->double('grad_average_sch_studentperay')->nullable();
            $table->integer('ug_degrees_perthousand_ugstudent')->nullable();
            $table->integer('ug_certi_perthousand_ugstudent')->nullable();
            $table->integer('graddegree_perhundredgradstudent')->nullable();
            $table->integer('grad_certi_perhundred_gradstudent')->nullable();
            $table->string('bachelordegree_4yeargradrate')->nullable();
            $table->string('bachelordegree_6yeargradrate')->nullable();
            $table->integer('associatedegree_certi3yeargradrate')->nullable();
            $table->string('loan_default_rate')->nullable();
<<<<<<< HEAD:database/migrations/2017_03_22_212650_create_datatable.php
=======
            $table->unique(['school_id', 'year']);
>>>>>>> 754bc367df9400c202fec53ac8160905187f4959:database/migrations/2017_03_22_212651_create_datatable.php
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('datatable');
    }
}