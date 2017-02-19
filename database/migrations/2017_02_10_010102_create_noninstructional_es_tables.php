<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoninstructionalEsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noninstructional_ess', function (Blueprint $table) {
            //
            $table->increments('NonInstructionalES_Id');
            $table->integer('School_Id');
            $table->integer('year');
            //$table->char('X_FT_NIns_StNum')->nullable();
            $table->integer('FT_NIns_StNum')->nullable();
            //$table->char('X_FT_NIns_StOutlays')->nullable();
            $table->bigInteger('FT_NIns_StOutlays')->nullable();
            //$table->char('X_ResNum')->nullable();
            $table->integer('ResNum')->nullable();
            //$table->char('X_ResOutlays')->nullable();
            $table->bigInteger('ResOutlays')->nullable();
            //$table->char('X_Pub_SerNum')->nullable();
            $table->integer('Pub_SerNum')->nullable();
            //$table->char('X_Pub_SerOutlays')->nullable();
            $table->bigInteger('Pub_SerOutlays')->nullable();
            //$table->char('X_LibCurArc_AcaAff_OtEduSerNum')->nullable();
            $table->integer('LibCurArc_AcaAff_OtEduSerNum')->nullable();
            //$table->char('X_LibCurArc_AcaAff_OtEduSerNumOutlays')->nullable();
            $table->bigInteger('LibCurArc_AcaAff_OtEduSerNumOutlays')->nullable();
            //$table->char('X_MgnNum')->nullable();
            $table->integer('MgnNum')->nullable();
            //$table->char('X_MgnOutlays')->nullable();
            $table->bigInteger('MgnOutlays')->nullable();
            //$table->char('X_BusFn_OpNum')->nullable();
            $table->integer('BusFn_OpNum')->nullable();
            //$table->char('X_BusFn_OpOutlays')->nullable();
            $table->bigInteger('BusFn_OpOutlays')->nullable();
            //$table->char('X_ComEng_SciNum')->nullable();
            $table->integer('ComEng_SciNum')->nullable();
            // $table->char('X_ComEng_SciOutlays')->nullable();
            $table->bigInteger('ComEng_SciOutlays')->nullable();
            //$table->char('X_ComSoc_SerLegArt_DesEntSptMedNum')->nullable();
            $table->integer('ComSoc_SerLegArt_DesEntSptMedNum')->nullable();
            //$table->char('X_ComSoc_SerLegArt_DesEntSptMedOly')->nullable();
            $table->bigInteger('ComSoc_SerLegArt_DesEntSptMedOly')->nullable();
            //$table->char('X_HC_PracTecNum')->nullable();
            $table->integer('HC_PracTecNum')->nullable();
            //$table->char('X_HC_PracTecOutlays')->nullable();
            $table->bigInteger('HC_PracTecOutlays')->nullable();
            //$table->char('X_SerNum')->nullable();
            $table->integer('SerNum')->nullable();
            //$table->char('X_SerOutlays')->nullable();
            $table->bigInteger('SerOutlays')->nullable();
            //$table->char('X_SalReNum')->nullable();
            $table->integer('SalReNum')->nullable();
            //$table->char('X_SalReOutlays')->nullable();
            $table->bigInteger('SalReOutlays')->nullable();
            //$table->char('X_OffAdmn_SupNum')->nullable();
            $table->integer('OffAdmn_SupNum')->nullable();
            // $table->char('X_OffAdmn_SupOutlays')->nullable();
            $table->bigInteger('OffAdmn_SupOutlays')->nullable();
            //$table->char('X_NatResConstMaintNum')->nullable();
            $table->integer('NatResCntMaintNum')->nullable();
            //$table->char('X_NatResConstMaintOutlays')->nullable();
            $table->bigInteger('NatResCntMaintOutlays')->nullable();
            //$table->char('X_ProdTran_MatMoNum')->nullable();
            $table->integer('ProdTran_MatMoNum')->nullable();
            //$table->char('X_ProdTran_MatMoOutlays')->nullable();
            $table->bigInteger('ProdTran_MatMoOutlays')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::drop('noninstructional_ess');
    }
}