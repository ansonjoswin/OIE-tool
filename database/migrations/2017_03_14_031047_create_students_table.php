<<<<<<< HEAD
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
            $table->bigIncrements('id');
            $table->integer('school_id')->index();
            $table->integer('year')->index();
            $table->integer('total_studentcount_1')->nullable();
            $table->integer('undrgradstudentcount_2')->nullable();
            $table->integer('gradstudentcount_4')->nullable();
            $table->integer('inst_act_ugcredit_hrs')->nullable();
            $table->integer('inst_act_gradcredit_hrs')->nullable();
            $table->integer('inst_activity_type')->nullable();
            $table->integer('under_certi_award_level1')->nullable();
            $table->integer('grad_certi_award_level6')->nullable();
            $table->integer('under_degree_award_level3')->nullable();
            $table->integer('grad_degree_award_level7')->nullable();
            $table->integer('under_degree_award_level5')->nullable();
            $table->integer('cohort_status13')->nullable();
            $table->integer('cohort_status9')->nullable();
            $table->integer('cohort_status8')->nullable();
            $table->integer('cohort_status30')->nullable();
            $table->integer('cohort_status29')->nullable();
            $table->integer('ug_student_perthousandstudent')->nullable();
            $table->integer('ug_average_sch_studentperay')->nullable();
            $table->integer('grad_average_sch_studentperay')->nullable();
            $table->integer('ug_degrees_perthousand_ugstudent')->nullable();
            $table->integer('ug_certi_perthousand_ugstudent')->nullable();
            $table->integer('graddegree_perhundredgradstudent')->nullable();
            $table->integer('grad_certi_perhundred_gradstudent')->nullable();
            $table->integer('bachelordegree_4yeargradrate')->nullable();
            $table->integer('bachelordegree_6yeargradrate')->nullable();
            $table->integer('associatedegree_certi3yeargradrate')->nullable();
            $table->unique(['school_id', 'year']);
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
        Schema::drop('students');
    }
}
=======
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
            $table->bigIncrements('id');
            $table->integer('school_id')->index();
            $table->integer('year')->index();
            $table->integer('total_studentcount_1')->nullable();
            $table->integer('undrgradstudentcount_2')->nullable();
            $table->integer('gradstudentcount_4')->nullable();
            $table->integer('inst_act_ugcredit_hrs')->nullable();
            $table->integer('inst_act_gradcredit_hrs')->nullable();
            $table->integer('inst_activity_type')->nullable();
            $table->integer('under_certi_award_level1')->nullable();
            $table->integer('grad_certi_award_level6')->nullable();
            $table->integer('under_degree_award_level3')->nullable();
            $table->integer('grad_degree_award_level7')->nullable();
            $table->integer('under_degree_award_level5')->nullable();
            $table->integer('cohort_status13')->nullable();
            $table->integer('cohort_status9')->nullable();
            $table->integer('cohort_status8')->nullable();
            $table->integer('cohort_status30')->nullable();
            $table->integer('cohort_status29')->nullable();
            $table->integer('ug_student_perthousandstudent')->nullable();
            $table->integer('ug_average_sch_studentperay')->nullable();
            $table->integer('grad_average_sch_studentperay')->nullable();
            $table->integer('ug_degrees_perthousand_ugstudent')->nullable();
            $table->integer('ug_certi_perthousand_ugstudent')->nullable();
            $table->integer('graddegree_perhundredgradstudent')->nullable();
            $table->integer('grad_certi_perhundred_gradstudent')->nullable();
            $table->integer('bachelordegree_4yeargradrate')->nullable();
            $table->integer('bachelordegree_6yeargradrate')->nullable();
            $table->integer('associatedegree_certi3yeargradrate')->nullable();
            $table->unique(['school_id', 'year']);
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
        Schema::drop('students');
    }
}
>>>>>>> b1fdac40b69f8f56d9316fcbe6f2873cf80affc2
