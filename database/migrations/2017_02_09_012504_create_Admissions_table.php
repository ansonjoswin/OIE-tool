<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {

            $table->increments('Admission_ID');
            $table->integer('year');
            $table->integer('School_Id');
            $table->integer('Ttl_Apl')->nullable();
            //$table->char('X_Ttl_Apl')->nullable();
            $table->integer('Ttl_Admn')->nullable();
            //$table->char('X_Ttl_Admn')->nullable();
            $table->integer('Ttl_FTEnr')->nullable();
            //$table->char('X_Ttl_FTEnr')->nullable();
            $table->integer('Ttl_PTEnr')->nullable();
            //$table->char('X_Ttl_PTEnr')->nullable();
            $table->integer('Ttl_Enr')->nullable();
            //$table->char('X_Ttl_Enr')->nullable();
            $table->integer('MaleAplCNT')->nullable();
            //$table->char('X_MaleAplCNT')->nullable();
            $table->integer('FemaleAplCNT')->nullable();
           // $table->char('X_FemaleAplCNT')->nullable();
            $table->integer('MaleAdmnCNT')->nullable();
            //$table->char('X_MaleAdmnCNT')->nullable();
            $table->integer('FemaleAdmnCNT')->nullable();
            //$table->char('X_FemaleAdmnCNT')->nullable();
            $table->integer('MEnrCNT')->nullable();
            //$table->char('X_MEnrCNT')->nullable();
            $table->integer('FEnrCNT')->nullable();
            //$table->char('X_FEnrCNT')->nullable();
            $table->integer('MEnrFT')->nullable();
            //$table->char('X_MEnrFT')->nullable();
            $table->integer('FEnrFT')->nullable();
            //$table->char('X_FEnrFT')->nullable();
            $table->integer('MEnrPT')->nullable();
            //$table->char('X_MEnrPT')->nullable();
            $table->integer('FEnrPT')->nullable();
            //$table->char('X_FEnrPT')->nullable();
            $table->integer('FT_CRSCohort')->nullable();
            //$table->char('X_FT_CRSCohort')->nullable();
            $table->integer('GRSCohort_Percent')->nullable();
            //$table->char('X_GRSCohort_Percent')->nullable();
            $table->integer('FT_Fall2013')->nullable();
            //$table->char('X_FT_Fall2013')->nullable();
            $table->integer('Excl_FT_Fall2013')->nullable();
            //$table->char('X_Excl_FT_Fall2013')->nullable();
            $table->integer('FT_Adj_Fall2013')->nullable();
            //$table->char('X_FT_Adj_Fall2013')->nullable();
            $table->integer('FT_AdjFall2013_EnrFall2014')->nullable();
           // $table->char('X_FT_AdjFall2013_EnrFall2014')->nullable();
            $table->integer('FT_RetRate2014')->nullable();
           // $table->char('X_FT_RetRate2014')->nullable();
            $table->integer('PT_Fall2013')->nullable();
            //$table->char('X_PT_Fall2013')->nullable();
            $table->integer('Excl_PT_Fall2013')->nullable();
            //$table->char('X_Excl_PT_Fall2013')->nullable();
            $table->integer('PT_Adj_Fall2013')->nullable();
           // $table->char('X_PT_Adj_Fall2013')->nullable();
            $table->integer('PT_AdjFall2013_EnrFall2014')->nullable();
            //$table->char('X_PT_AdjFall2013_EnrFall2014')->nullable();
            $table->integer('PT_RetRate2014')->nullable();
           // $table->char('X_PT_RetRate2014')->nullable();
            $table->integer('TtlEnterinStd_UG')->nullable();
           // $table->char('X_TtlEnterinStd_UG')->nullable();
            $table->integer('Grp_CmpCat_Rpt')->nullable();
           // $table->char('X_Grp_CmpCat_Rpt')->nullable();
            $table->integer('Data_FbRpt')->nullable();
           // $table->char('X_Data_FbRpt')->nullable();
            $table->integer('Std_Fac')->nullable();
           // $table->char('X_Std_Fac')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('School_Id')->references('School_Id')->on('schools')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admissions');
    }
}

