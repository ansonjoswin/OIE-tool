<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
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
            $table->bigIncrements('id');
            $table->bigInteger('unitid')->unique();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip')->nullable();
            $table->integer('fips_state_code')->nullable();
            $table->integer('geo_location')->nullable();
            $table->string('admin_name')->nullable();
            $table->string('admin_title')->nullable();
            $table->integer('telephone_number')->nullable();
            $table->integer('emp_id')->nullable();
            $table->integer('opeid')->unique();
            $table->integer('ope_flag')->nullable();
            $table->string('school_url')->nullable();
            $table->string('admission_url')->nullable();
            $table->string('finance_url')->nullable();
            $table->string('online_app_url')->nullable();
            $table->string('netprice_calcurl')->nullable();
            $table->string('veterans_url')->nullable();
            $table->string('athlete_graduationrate_url')->nullable();
            $table->integer('sector')->nullable();
            $table->integer('institution_level')->nullable();
            $table->integer('institution_control')->nullable();
            $table->integer('highestlevel_offering')->nullable();
            $table->integer('ug_offering')->nullable();
            $table->integer('grad_offering')->nullable();
            $table->integer('highestdegree_offered')->nullable();
            $table->integer('degreegranting_status')->nullable();
            $table->integer('historical_blackCollege')->nullable();
            $table->integer('hospital')->nullable();
            $table->integer('grant_medicaldegree')->nullable();
            $table->integer('tribal_college')->nullable();
            $table->integer('degree_urbanization')->nullable();
            $table->integer('open_public')->nullable();
            $table->integer('mergedschool_unitid')->nullable();
            $table->char('status')->nullable();
            $table->integer('year_deletion_ipeds')->nullable();
            $table->integer('closed_date')->nullable();
            $table->integer('current_year_active')->nullable();
            $table->integer('postsec_indicator')->nullable();
            $table->integer('postsec_inst_indicator')->nullable();
            $table->integer('postsectitle_instindicator')->nullable();
            $table->integer('reporting_method')->nullable();
            $table->string('institutename_alias')->nullable();
            $table->integer('institute_category')->nullable();
            $table->integer('landgrand_institution')->nullable();
            $table->integer('institute_sizecategory')->nullable();
            $table->integer('cbsa')->nullable();
            $table->integer('cbsa_type')->nullable();
            $table->integer('combinedstasticalarea')->nullable();
            $table->integer('newengland_citytownarea')->nullable();
            $table->integer('multi_inst')->nullable();
            $table->string('multi_inst_name')->nullable();
            $table->integer('multi_inst_id')->nullable();
            $table->integer('fips_countycode')->nullable();
            $table->string('county_name')->nullable();
            $table->integer('cogressional_distcode')->nullable();
            $table->double('geo_longitude', 6, 3)->nullable();
            $table->double('geo_latitude', 6, 3)->nullable();
			$table->integer('datafeedback_report_nces')->nullable();
            $table->integer('datafeedback_report_Group')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
			$table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('schools');
    }
}
