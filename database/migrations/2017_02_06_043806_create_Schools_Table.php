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
            $table->bigIncrements('School_Id');
            $table->bigInteger('Unit_Id')->unique();
            $table->string('School_Name')->nullable();
            $table->string('School_Address')->nullable();
            $table->string('School_City')->nullable();
            $table->string('School_State')->nullable();
            $table->integer('School_Zip')->nullable();
            $table->integer('School_St_FIPS')->nullable();
            $table->integer('School_GeoLoc')->nullable();
            $table->string('Admin_Name')->nullable();
            $table->string('Admin_Title')->nullable();
            $table->integer('School_TelNum')->nullable();
            $table->integer('EmpID')->nullable();
            $table->integer('OPE_ID')->nullable();
            $table->integer('OPE_Flag')->nullable();
            $table->string('SchoolURL')->nullable();
            $table->string('AdmnURL')->nullable();
            $table->string('FinanceURL')->nullable();
            $table->string('OnlineAppURL')->nullable();
            $table->string('NetPrice_CalcURL')->nullable();
            $table->string('VetURL')->nullable();
            $table->string('AuthURL')->nullable();
            $table->integer('School_Sector')->nullable();
            $table->integer('School_Level')->nullable();
            $table->integer('School_Control')->nullable();
            $table->integer('HL_Offering')->nullable();
            $table->integer('UG_Offering')->nullable();
            $table->integer('Grad_Offering')->nullable();
            $table->integer('HD_Offered')->nullable();
            $table->integer('Deg_GrantStat')->nullable();
            $table->integer('Hist_BlkColg')->nullable();
            $table->integer('Hospital')->nullable();
            $table->integer('Inst_MedicalDeg')->nullable();
            $table->integer('TribalClg')->nullable();
            $table->integer('Deg_Urban')->nullable();
            $table->integer('OpenPublic')->nullable();
            $table->integer('MergedSchool_UNITID')->nullable();
            $table->char('School_Status')->nullable();
            $table->integer('IPEDS_DeleteYr')->nullable();
            $table->integer('School_ClosedDt')->nullable();
            $table->integer('CurrentYr_Active')->nullable();
            $table->integer('PostSec_Indicator')->nullable();
            $table->integer('PostSec_InstIndicator')->nullable();
            $table->integer('PostSec_4InstIndicator')->nullable();
            $table->integer('Rpt_Method')->nullable();
            $table->string('Inst_NameAlias')->nullable();
            $table->integer('Inst_Catgry')->nullable();
            $table->integer('Land_GrandInst')->nullable();
            $table->integer('Inst_SizeCategory')->nullable();
            $table->integer('CBSA')->nullable();
            $table->integer('CBSA_Type')->nullable();
            $table->integer('Combined_StArea')->nullable();
            $table->integer('NewEng_CityTown')->nullable();
            $table->integer('MultiInst')->nullable();
            $table->string('MultiInst_Name')->nullable();
            $table->integer('MultiInst_ID')->nullable();
            $table->integer('Fips_CtyCode')->nullable();
            $table->string('School_Country')->nullable();
            $table->integer('Cogressional_DistCode')->nullable();
            $table->double('GeoLong', 6, 3)->nullable();
            $table->double('GeoLat', 6, 3)->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
