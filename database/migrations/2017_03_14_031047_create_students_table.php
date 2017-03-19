<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            // student Table Attributes
            $table->integer('school_id')->unsigned();
            $table->integer('year')->index();
            $table->float('total_studentcount_1')->nullable();
            $table->float('undrgradstudentcount_2')->nullable();
            $table->float('gradstudentcount_4')->nullable();
            $table->float('inst_act_ugcredit_hrs')->nullable();
            $table->float('inst_act_gradcredit_hrs')->nullable();
            $table->float('inst_activity_type')->nullable();
            $table->float('under_certi_award_level1')->nullable();
            $table->float('grad_certi_award_level6')->nullable();
            $table->float('under_degree_award _level3')->nullable();
            $table->float('grad_degree_award_level7')->nullable();
            $table->float('cohort_status13')->nullable();
            $table->float('cohort_status15')->nullable();
            $table->float('cohort_status8')->nullable();
            $table->float('cohort_status30')->nullable();
            $table->float('cohort_status29')->nullable();
            $table->float('ug_student_perthousandstudent')->nullable();
            $table->float('ug_average_sch_studentperay')->nullable();
            $table->float('grad_average_sch_studentperay')->nullable();
            $table->float('ug_degrees_perthousand_ugstudent')->nullable();
            $table->float('ug_certi_perthousand_ugstudent')->nullable();
            $table->float('graddegree_perthousandgradstudent')->nullable();
            $table->float('grad_certi_perthousand_gradstudent')->nullable();
            $table->float('bachelordegree_4yeargradrate')->nullable();
            $table->float('bachelordegree_6yeargradrate')->nullable();
            $table->float('associatedegree_certi3yeargradrate')->nullable();
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
        Schema::drop('students');
    }
}
