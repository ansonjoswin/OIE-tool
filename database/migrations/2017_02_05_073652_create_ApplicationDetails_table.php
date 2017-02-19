<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicationdetails', function (Blueprint $table) {

            $table->increments('Application_ID');
            $table->integer('year')->nullable();
            $table->integer('School_ID')->unsigned();
            $table->integer('SecSchGPA')->nullable();
            $table->integer('SecSchRank')->nullable();
            $table->integer('SecSchRec')->nullable();
            $table->integer('CmplClgPrepPgm')->nullable();
            $table->integer('Recommendations')->nullable();
            $table->integer('FrmDemCompt')->nullable();
            $table->integer('AdmTestSrc')->nullable();
            $table->integer('TOEFL_Src')->nullable();
            $table->integer('OtherTest_Src')->nullable();
            $table->integer('Num_1stTime_Dgr_CerSubSATscr')->nullable();
            //$table->integer('X_Num_1stTime_Dgr_CerSubSATscr')->nullable();
            $table->integer('Per_1stTime_Dgr_CerSubSATscr')->nullable();
            //$table->integer('X_Per_1stTime_Dgr_CerSubSATscr')->nullable();
            $table->integer('Num_1stTime_Dgr_CerSubACTscr')->nullable();
            //$table->integer('X_Num_1stTime_Dgr_CerSubACTscr')->nullable();
            $table->integer('Per_1stTime_Dgr_CerSubACTscr')->nullable();
            //$table->integer('X_Per_1stTime_Dgr_CerSubACTscr')->nullable();
            $table->integer('SAT_Rdg25PS')->nullable();
            //$table->char('X_SAT_Rdg25PS')->nullable();
            $table->integer('SAT_Rdg75PS')->nullable();
            //$table->char('X_SAT_Rdg75PS')->nullable();
            $table->integer('SAT_Math25PS')->nullable();
            //$table->char('X_SAT_Math25PS')->nullable();
            $table->integer('SAT_Math75PS')->nullable();
            //$table->char('X_SAT_Math75PS')->nullable();
            $table->integer('SAT_Wrt25PS')->nullable();
            //$table->char('X_SAT_Wrt25PS')->nullable();
            $table->integer('SAT_Wrt75PS')->nullable();
            //$table->char('X_SAT_Writing75PS')->nullable();
            $table->integer('ACT_Comp25PS')->nullable();
            //$table->char('X_ACT_Comp25PS')->nullable();
            $table->integer('ACT_Comp5PS')->nullable();
           // $table->char('X_ACT_Comp75PS')->nullable();
            $table->integer('ACT_Eng25PS')->nullable();
           // $table->char('X_ACT_Eng25PS')->nullable();
            $table->integer('ACT_Eng75PS')->nullable();
            //$table->char('X_ACT_Eng75PS')->nullable();
            $table->integer('ACT_Math25PS')->nullable();
            //$table->char('X_ACT_Math25PS')->nullable();
            $table->integer('ACT_Math75PS')->nullable();
           // $table->char('X_ACT_Math75PS')->nullable();
            $table->integer('ACT_Wrt25PS')->nullable();
            //$table->char('X_ACT_Wrt25PS')->nullable();
            $table->integer('ACT_Wrt75PS')->nullable();
           // $table->char('X_ACT_Wrt75PS')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->foreign('School_ID')->references('School_ID')->on('schools')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applicationdetails');
    }
}
