<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateNprofsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_nprofs', function (Blueprint $table) {

            $table->increments('PrivateNProf_ID');
            $table->integer('Finance_ID');
            $table->integer('TtlUnRestAss')->nullable();
            $table->integer('TtlRestAss')->nullable();
            $table->integer('PermRestrcAsstltAss')->nullable();
            $table->integer('TmpRestrcAss')->nullable();
            $table->integer('L_improvements_EndYr')->nullable();
            $table->integer('Buildings_EndYr')->nullable();
            $table->integer('EquipmentArtLib_EndYr')->nullable();
            $table->integer('SpecChangeAss')->nullable();
            $table->integer('TtlChangeAss')->nullable();
            $table->integer('Ass_BegnYr')->nullable();
            $table->integer('AdjBegnYrAss')->nullable();
            $table->integer('Ass_endYr')->nullable();
            $table->integer('LclGrnt')->nullable();
            $table->integer('InstGrnt_Funded')->nullable();
            $table->integer('InstGrnt_Unfunded')->nullable();
            $table->integer('TuFee_Ttl')->nullable();
            $table->integer('TuFee_UnRest')->nullable();
            $table->integer('TuFee_TmpRest')->nullable();
            $table->integer('TuFee_PermRest')->nullable();
            $table->integer('FedAppro_Ttl')->nullable();
            $table->integer('FedAppro_UnRest')->nullable();
            $table->integer('FedAppro_TmpRest')->nullable();
            $table->integer('FedAppro_PermRest')->nullable();
            $table->integer('StAppro_Ttl')->nullable();
            $table->integer('StAppro_UnRest')->nullable();
            $table->integer('StAppro_TmpRest')->nullable();
            $table->integer('StAppro_PermRest')->nullable();
            $table->integer('LclAppro_Ttl')->nullable();
            $table->integer('LclAppro_UnRest')->nullable();
            $table->integer('LclAppro_TmpRest')->nullable();
            $table->integer('LclAppro_PermRest')->nullable();
            $table->integer('FedGrntCntrc_Ttl')->nullable();
            $table->integer('FedGrntCntrc_UnRest')->nullable();
            $table->integer('FedGrntCntrc_TmpRest')->nullable();
            $table->integer('FedGrntCntrc_PemRest')->nullable();
            $table->integer('StGrntCntrc_Ttl')->nullable();
            $table->integer('StGrntCntrc_UnRest')->nullable();
            $table->integer('StGrntCntrc_TmpRest')->nullable();
            $table->integer('StGrntCntrc_PermRest')->nullable();
            $table->integer('LclGrntCntrc_Ttl')->nullable();
            $table->integer('LclGrntCntrc_UnRest')->nullable();
            $table->integer('LclGrntCntrc_TmpRest')->nullable();
            $table->integer('LclGrntCntrc_PermRest')->nullable();
            $table->integer('PrvGfts_GrntCntrc_Ttl')->nullable();
            $table->integer('PrvGftsGrntCntrc_UnRest')->nullable();
            $table->integer('PrvGftsGrntCntrc_TmpRest')->nullable();
            $table->integer('PrvGftsGrntCntrc_PermRest')->nullable();
            $table->integer('PrvGfts_Ttl')->nullable();
            $table->integer('PrvGfts_UnRest')->nullable();
            $table->integer('PrvGfts_TmpRest')->nullable();
            $table->integer('PrvGfts_PermRest')->nullable();
            $table->integer('PrvGrnt_contrants_Ttl')->nullable();
            $table->integer('PrvGrntCntrc_UnRest')->nullable();
            $table->integer('PrvGrntCntrc_TmpRest')->nullable();
            $table->integer('PrvGrntCntrc_PermRest')->nullable();
            $table->integer('ContriAfflEnt_Ttl')->nullable();
            $table->integer('ContriAfflEnt_UnRest')->nullable();
            $table->integer('ContriAfflEnt_TmpRest')->nullable();
            $table->integer('ContriAfflEnt_PermRest')->nullable();
            $table->integer('InvesRet_Ttl')->nullable();
            $table->integer('InvesRet_UnRest')->nullable();
            $table->integer('InvesRet_TmpRest')->nullable();
            $table->integer('InvesRet_PermRest')->nullable();
            $table->integer('Sales_ServEducalAct_Ttl')->nullable();
            $table->integer('Sales_ServEducalAct_UnRest')->nullable();
            $table->integer('Sales_ServAuxEntp_Ttl')->nullable();
            $table->integer('Sales_ServAuxEntp_UnRest')->nullable();
            $table->integer('HospRev_Ttl')->nullable();
            $table->integer('HospRev_UnRest')->nullable();
            $table->integer('IndpOpsRev_Ttl')->nullable();
            $table->integer('IndpOpsRev_UnRest')->nullable();
            $table->integer('IndpOpsRev_TmpRest')->nullable();
            $table->integer('IndpOpsRev_PermRest')->nullable();
            $table->integer('OthRev_Ttl')->nullable();
            $table->integer('OthRev_UnRest')->nullable();
            $table->integer('OthRev_TmpRest')->nullable();
            $table->integer('OthRev_PermRest')->nullable();
            $table->integer('TtlRevs_InvesRet_Ttl')->nullable();
            $table->integer('TtlRevs_InvesRet_UnRest')->nullable();
            $table->integer('TtlRevsInvesRetTmpRest')->nullable();
            $table->integer('TtlRevsInvesRetPermRest')->nullable();
            $table->integer('AssRest_Ttl')->nullable();
            $table->integer('AssRest_UnRest')->nullable();
            $table->integer('AssRest_TmpRest')->nullable();
            $table->integer('AssRest_PermRest')->nullable();
            $table->integer('TtlRevs_AftrAssRest_Ttl')->nullable();
            $table->integer('TtlRevs_AftrAssRest_UnRest')->nullable();
            $table->integer('TtlRevs_AftrAssRest_TmpRest')->nullable();
            $table->integer('TtlRevs_AftrAssRest_PermRest')->nullable();
            $table->integer('IndpOps_TtlAmt')->nullable();
            $table->integer('IndpOps_Sal_wages')->nullable();
            $table->integer('IndpOps_Benft')->nullable();
            $table->integer('IndpOps_Oprtn_MaintPlant')->nullable();
            $table->integer('IndpOps_Deprctn')->nullable();
            $table->integer('IndpOps_Interest')->nullable();
            $table->integer('IndpOps_AllOth')->nullable();
            $table->integer('TtlExpns_Oprtn_MaintPlant')->nullable();
            /*$table->char('X_TtlUnRestAss',5)->nullable();
            $table->char('X_TtlRestAss',5)->nullable();
            $table->char('X_PermRestAssincludedinTtlRestAss',5)->nullable();
            $table->char('X_TmpRestAss',5)->nullable();
            $table->char('X_L_improvements_EndYr',5)->nullable();
            $table->char('X_Buildings_EndYr',5)->nullable();
            $table->char('X_EquipmentArtLibCollecsEndYr',5)->nullable();
            $table->char('X_OthSpecChngsAss',5)->nullable();
            $table->char('X_TtlChangeAss',5)->nullable();
            $table->char('X_Ass_BegnYr',5)->nullable();
            $table->char('X_AdjToBegnYrAss',5)->nullable();
            $table->char('X_Ass_endYr',5)->nullable();
            $table->char('X_LclGrnt',5)->nullable();
            $table->char('X_InstGrnt_Funded',5)->nullable();
            $table->char('X_InstGrnt_Unfunded',5)->nullable();
            $table->char('X_TuFee_Ttl',5)->nullable();
            $table->char('X_TuFee_UnRest',5)->nullable();
            $table->char('X_TuFee_TmpRest',5)->nullable();
            $table->char('X_TuFee_PermRest',5)->nullable();
            $table->char('X_FedAppro_Ttl',5)->nullable();
            $table->char('X_FedAppro_UnRest',5)->nullable();
            $table->char('X_FedAppro_TmpRest',5)->nullable();
            $table->char('X_FedAppro_PermRest',5)->nullable();
            $table->char('X_StAppro_Ttl',5)->nullable();
            $table->char('X_StAppro_UnRest',5)->nullable();
            $table->char('X_StAppro_TmpRest',5)->nullable();
            $table->char('X_StAppro_PermRest',5)->nullable();
            $table->char('X_LclAppro_Ttl',5)->nullable();
            $table->char('X_LclAppro_UnRest',5)->nullable();
            $table->char('X_LclAppro_TmpRest',5)->nullable();
            $table->char('X_LclAppro_PermRest',5)->nullable();
            $table->char('X_FedGrntCntrc_Ttl',5)->nullable();
            $table->char('X_FedGrntCntrc_UnRest',5)->nullable();
            $table->char('X_FedGrntCntrc_TmpRest',5)->nullable();
            $table->char('X_FedGrntCntrc_PemRest',5)->nullable();
            $table->char('X_StGrntCntrc_Ttl',5)->nullable();
            $table->char('X_StGrntCntrc_UnRest',5)->nullable();
            $table->char('X_StGrntCntrc_TmpRest',5)->nullable();
            $table->char('X_StGrntCntrc_PermRest',5)->nullable();
            $table->char('X_LclGrntCntrc_Ttl',5)->nullable();
            $table->char('X_LclGrntCntrc_UnRest',5)->nullable();
            $table->char('X_LclGrntCntrc_TmpRest',5)->nullable();
            $table->char('X_LclGrntCntrc_PermRest',5)->nullable();
            $table->char('X_PrvGfts_GrntCntrc_Ttl',5)->nullable();
            $table->char('X_PrvGfts_GrntCntrc_UnRest',5)->nullable();
            $table->char('X_PrvGfts_GrntCntrc_TmpRest',5)->nullable();
            $table->char('X_PrvGfts_GrntCntrc_PermRest',5)->nullable();
            $table->char('X_PrvGfts_Ttl',5)->nullable();
            $table->char('X_PrvGfts_UnRest',5)->nullable();
            $table->char('X_PrvGfts_TmpRest',5)->nullable();
            $table->char('X_PrvGfts_PermRest',5)->nullable();
            $table->char('X_PrvGrnt_contrants_Ttl',5)->nullable();
            $table->char('X_PrvGrntCntrc_UnRest',5)->nullable();
            $table->char('X_PrvGrntCntrc_TmpRest',5)->nullable();
            $table->char('X_PrvGrntCntrc_PermRest',5)->nullable();
            $table->char('X_ContriAfflEnt_Ttl',5)->nullable();
            $table->char('X_ContriAfflEnt_UnRest',5)->nullable();
            $table->char('X_ContriAfflEnt_TmpRest',5)->nullable();
            $table->char('X_ContriAfflEnt_PermRest',5)->nullable();
            $table->char('X_InvesRet_Ttl',5)->nullable();
            $table->char('X_InvesRet_UnRest',5)->nullable();
            $table->char('X_InvesRet_TmpRest',5)->nullable();
            $table->char('X_InvesRet_PermRest',5)->nullable();
            $table->char('X_Sales_ServEducalAct_Ttl',5)->nullable();
            $table->char('X_Sales_ServEducalAct_UnRest',5)->nullable();
            $table->char('X_Sales_ServAuxEntp_Ttl',5)->nullable();
            $table->char('X_Sales_ServAuxEntp_UnRest',5)->nullable();
            $table->char('X_HospRev_Ttl',5)->nullable();
            $table->char('X_HospRev_UnRest',5)->nullable();
            $table->char('X_IndpOpsRev_Ttl',5)->nullable();
            $table->char('X_IndpOpsRev_UnRest',5)->nullable();
            $table->char('X_IndpOpsRev_TmpRest',5)->nullable();
            $table->char('X_IndpOpsRev_PermRest',5)->nullable();
            $table->char('X_OthRev_Ttl',5)->nullable();
            $table->char('X_OthRev_UnRest',5)->nullable();
            $table->char('X_OthRev_TmpRest',5)->nullable();
            $table->char('X_OthRev_PermRest',5)->nullable();
            $table->char('X_TtlRevs_InvesRet_Ttl',5)->nullable();
            $table->char('X_Ttl Revs_InvesRet_UnRest',5)->nullable();
            $table->char('X_Ttl Revs_InvesRet_TmpRest',5)->nullable();
            $table->char('X_TtlRevs_InvesRet_PermRest',5)->nullable();
            $table->char('X_AssRest_Ttl',5)->nullable();
            $table->char('X_AssRest_UnRest',5)->nullable();
            $table->char('X_AssRest_TmpRest',5)->nullable();
            $table->char('X_AssRest_PermRest',5)->nullable();
            $table->char('X_TtlRevs_AftrAssRest_Ttl',5)->nullable();
            $table->char('X_TtlRevs_AftrAssRest_UnRest',5)->nullable();
            $table->char('X_TtlRevs_AftrAssRest_TmpRest',5)->nullable();
            $table->char('X_TtlRevs_AftrAssRest_PermRest',5)->nullable();
            $table->char('X_IndpOps_TtlAmt',5)->nullable();
            $table->char('X_IndpOps_Sal_wages',5)->nullable();
            $table->char('X_IndpOps_Benft',5)->nullable();
            $table->char('X_IndpOps_Oprtn_MaintPlant',5)->nullable();
            $table->char('X_IndpOps_Deprctn',5)->nullable();
            $table->char('X_IndpOps_Interest',5)->nullable();
            $table->char('X_IndpOps_AllOth',5)->nullable();
            $table->char('X_Ttl Expns_Oprtn_MaintPlant',5)->nullable();*/
            $table->String('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->foreign('Finance_ID')->references('Finance_ID')->on('finances')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('private_nprofs');
    }
}
