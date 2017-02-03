<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            // School Table Attributes
            $table->bigIncrements('school_id');
            $table->bigInteger('unit_id');
            $table->string('school_name');
            $table->string('school_city');
            $table->string('school_state');
            $table->double('longitude', 3, 6);
            $table->double('latitude', 3, 6);
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
            $table->string('webAddress')->nullable();
            $table->string('level')->nullable();
            $table->string('control_type')->nullable();
            $table->string('institution_category')->nullable();
            $table->string('carnegie_classification')->nullable();
            $table->string('award_levels')->nullable();
            $table->string('religious_affiliation')->nullable();
            $table->string('calendar_system')->nullable();
            $table->string('distance_learning')->nullable();
            $table->string('reporting_method')->nullable();
            $table->string('campus_setting')->nullable();
            $table->bigInteger('opeid')->unique()->nullable();
            $table->string('title_iv_institution')->nullable();
            $table->softDeletes();
        });


        Schema::create('peer_group', function (Blueprint $table) {
            //
            $table->mediumIncrements('peer_group_id');
            $table->string('peer_group_name');
            $table->bigInteger('user_id')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::create('school_peer_group', function (Blueprint $table) {
            //
            $table->bigInteger('school_id');
            $table->bigInteger('peer_group_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->foreign('peer_group_id')->references('peer_group_id')->on('peer_group');
            $table->primary(['school_id'],['peer_group_id']);
        });


        Schema::create('test_scores', function (Blueprint $table) {
            //
            $table->bigInteger('year')->unique();
            $table->string('act');
            $table->integer('25th percentile');
            $table->integer('75th percentile');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });

        Schema::create('student_financial_aid', function (Blueprint $table) {
            //
            $table->bigInteger('year')->unique();
            $table->string('aid_type');
            $table->float('percent_receiving_aid', 3, 2);
            $table->integer('average_amount_of_aid_received');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });


        Schema::create('student_charges', function (Blueprint $table) {
            //
            $table->integer('year')->unique();
            $table->string('fee_type');
            $table->integer('cost_of_attendance');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });


        Schema::create('finance', function (Blueprint $table) {
            //
            $table->integer('year')->unique();
            $table->string('core_revenue_source_type');
            $table->integer('core_revenue');
            $table->string('core_expenses_source_type');
            $table->integer('core_expenses');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });


        Schema::create('completions', function (Blueprint $table) {
            //
            $table->integer('year')->unique();
            $table->string('completion_type');
            $table->string('race');
            $table->string('program');
            $table->integer('certificate_below_bachelor');
            $table->integer('certificate_above_bachelor');
            $table->integer('associate');
            $table->integer('bachelors');
            $table->integer('masters');
            $table->integer('doctors_research');
            $table->integer('doctors_professional_practice');
            $table->integer('doctors_others');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);

        });


        Schema::create('admission', function (Blueprint $table) {
            //
            $table->integer('year')->unique();
            $table->string('applicants');
            $table->integer('number_applied');
            $table->integer('number_admitted');
            $table->integer('number_enrolled_full_time');
            $table->integer('number_enrolled_part_time');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });


        Schema::create('graduation', function (Blueprint $table) {
            //
            $table->integer('year')->unique();
            $table->string('gender_race_ethnicity');
            $table->float('graduation_rate', 3, 3);
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });


        Schema::create('retention', function (Blueprint $table) {
            //
            $table->integer('year')->unique();
            $table->string('undergraduate_type');
            $table->float('retention_rate', 3, 3);
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });


        Schema::create('employee', function (Blueprint $table) {
            //
            $table->integer('year')->unique();
            $table->string('occupational_category');
            $table->integer('total');
            $table->integer('full_time');
            $table->integer('part-time');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });


        Schema::create('employee_salary', function (Blueprint $table) {
            //
            $table->integer('year')->unique();
            $table->string('academic_rank');
            $table->mediumInteger('average_salary');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });


        Schema::create('net_price_scholarship_aid', function (Blueprint $table) {
            //
            $table->integer('year')->unique();
            $table->integer('avg_net_price_of_attendance');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });


        Schema::create('net_price_title-IV_aid', function (Blueprint $table) {
            //
            $table->integer('year')->unique();
            $table->string('income_range');
            $table->integer('avg_net_price_attendance');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });

        Schema::create('students', function (Blueprint $table) {
            $table->integer('year')->unique();
            $table->bigInteger('school_id')->unique();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });

        Schema::create('all_students', function (Blueprint $table) {
            $table->integer('year')->unique();
            $table->string('degree_type');
            $table->bigInteger('total');
            $table->bigInteger('men');
            $table->bigInteger('women');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('students');
            $table->foreign('year')->references('year')->on('students');
            $table->primary(['year'],['school_id']);
        });

        Schema::create('part_time_students', function (Blueprint $table) {
            $table->integer('year')->unique();
            $table->string('degree_type');
            $table->bigInteger('total');
            $table->bigInteger('men');
            $table->bigInteger('women');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('students');
            $table->foreign('year')->references('year')->on('students');
            $table->primary(['year'],['school_id']);
        });

        Schema::create('full_time_students', function (Blueprint $table) {
            $table->integer('year')->unique();
            $table->string('degree_type');
            $table->bigInteger('total');
            $table->bigInteger('men');
            $table->bigInteger('women');
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('students');
            $table->foreign('year')->references('year')->on('students');
            $table->primary(['year'],['school_id']);
        });

        Schema::create('loan_default_rate', function (Blueprint $table) {
            $table->integer('year')->unique();
            $table->string('school_name');
            $table->decimal('default_rate', 3, 2)->nullable();
            $table->bigInteger('No_in_Default');
            $table->bigInteger('No_in_Repay');
            $table->bigInteger('enrollment_figures');
            $table->decimal('percentage_calculation', 3, 2);
            $table->bigInteger('school_id');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->primary(['year'],['school_id']);
        });


        Schema::create('map_tables', function (Blueprint $table) {
            $table->increments("id");
            $table->string('table_name')->unique();
            $table->string('filename')->unique();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('maps', function (Blueprint $table) {
            $table->increments('maps_id');
            $table->string('column_header');
            $table->string('csv_header')->nullable();
            $table->string('table_name')->nullable();
            $table->string('filename')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('table_name')->references('table_name')->on('map_tables');
            $table->foreign('filename')->references('filename')->on('map_tables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('school_peer_group');
        Schema::drop('test_scores');
        Schema::drop('student_financial_aid');
        Schema::drop('student_charges');
        Schema::drop('finance');
        Schema::drop('completions');
        Schema::drop('admission');
        Schema::drop('graduation');
        Schema::drop('retention');
        Schema::drop('employee');
        Schema::drop('employee_salary');
        Schema::drop('net_price_scholarship_aid');
        Schema::drop('net_price_title-IV_aid');
        Schema::drop('all_students');
        Schema::drop('part_time_students');
        Schema::drop('full_time_students');
        Schema::drop('loan_default_rate');
        Schema::drop('students');
        Schema::drop('peer_group');
        Schema::drop('schools');
        Schema::drop('maps');
        Schema::drop('map_tables');
    }
}

