<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publics', function (Blueprint $table) {

            $table->increments('Public_ID');
            $table->integer('Finance_ID')->unsigned();
            $table->integer('TtlCurntAsst')->nullable();
            $table->integer('Dep_CapAsst_NetDep')->nullable();
            $table->integer('OtherNoncurntAsst')->nullable();
            $table->integer('TtlNoncurntAsst')->nullable();
            $table->integer('LTermDebt_CrtPrt')->nullable();
            $table->integer('OtherCurntLiab')->nullable();
            $table->integer('TtlCurntLiab')->nullable();
            $table->integer('LtermDebt')->nullable();
            $table->integer('OtherNoncurntLiab')->nullable();
            $table->integer('TtlNoncurntLiab')->nullable();
            $table->integer('InvCapAsst_NetRelDebt')->nullable();
            $table->integer('Restr_Expnd')->nullable();
            $table->integer('Lcl')->nullable();
            $table->integer('UnRestr')->nullable();
            $table->integer('LImpt_EndBal')->nullable();
            $table->integer('Inf_EndBal')->nullable();
            $table->integer('Blds_EndBal')->nullable();
            $table->integer('Equ_IncArt_LibCol_EndBal')->nullable();
            $table->integer('ConstProgs_EndBal')->nullable();
            $table->integer('TtlPlt_PropEquip_EndBal')->nullable();
            $table->integer('AccumDep_EndBal')->nullable();
            $table->integer('IntAsst_NetAccumAmo_EndBal')->nullable();
            $table->integer('OthCapAsst_EndBalNwAlg')->nullable();
            $table->integer('TutFees_AftrDedDiscs_Allows')->nullable();
            $table->integer('FedOptGrnt_Contrc')->nullable();
            $table->integer('StOptGrnt_Contrc')->nullable();
            $table->integer('Lcl_PrvOptGrnt_Contrc')->nullable();
            $table->integer('LclOptGrnt_Contrc')->nullable();
            $table->integer('PrvOptGrnt_Contrc')->nullable();
            $table->integer('Sal_ServHosp')->nullable();
            $table->integer('IndOps')->nullable();
            $table->integer('OtherSrc_Opt')->nullable();
            $table->integer('TtlOptRev')->nullable();
            $table->integer('LclApp_EduDistTax_SlrSup')->nullable();
            $table->integer('FedNonOptGrnt')->nullable();
            $table->integer('StNonOptGrnt')->nullable();
            $table->integer('LclNonOptGrnt')->nullable();
            $table->integer('Gfts_IncContAfflOrg')->nullable();
            $table->integer('InvtIncm')->nullable();
            $table->integer('OtherNonOptRev')->nullable();
            $table->integer('TtlNonOptRev')->nullable();
            $table->integer('TtlOpt_NonOptRev')->nullable();
            $table->integer('CptApp')->nullable();
            $table->integer('CptGrnt_Gfts')->nullable();
            $table->integer('AddtnPermEndws')->nullable();
            $table->integer('OtherRev_Addtn')->nullable();
            $table->integer('TtlOtherRev_Addtn')->nullable();
            $table->integer('TtlRev_OtherAddtn')->nullable();
            $table->integer('Inst_CrtYrTtl')->nullable();
            $table->integer('Inst_SalWages')->nullable();
            $table->integer('Inst_EmpFringeBenft')->nullable();
            $table->integer('Inst_Ops_MaintOfPlant')->nullable();
            $table->integer('Inst_Dep')->nullable();
            $table->integer('Inst_Interest')->nullable();
            $table->integer('Inst_AllOther')->nullable();
            $table->integer('Res_CrtYrTtl')->nullable();
            $table->integer('Res_SalWages')->nullable();
            $table->integer('Res_EmpFringeBft')->nullable();
            $table->integer('Res_Ops_MaintOfPlant')->nullable();
            $table->integer('Res_Dep')->nullable();
            $table->integer('Res_Interest')->nullable();
            $table->integer('Res_AllOther')->nullable();
            $table->integer('PubServ_CrtYrTtl')->nullable();
            $table->integer('PubServ_SalWages')->nullable();
            $table->integer('PubServ_EmpFringeBft')->nullable();
            $table->integer('PubServ_Ops_MaintOfPlant')->nullable();
            $table->integer('PubServ_Dep')->nullable();
            $table->integer('PubServ_Interest')->nullable();
            $table->integer('PubServ_AllOther')->nullable();
            $table->integer('AcdSup_CrtYrTtl')->nullable();
            $table->integer('AcadSup_SalWages')->nullable();
            $table->integer('AcadSup_EmpFringeBft')->nullable();
            $table->integer('AcadSup_Ops_MaintOfPlant')->nullable();
            $table->integer('AcadSup_Dep')->nullable();
            $table->integer('AcadSup_Int')->nullable();
            $table->integer('AcadSup_AllOther')->nullable();
            $table->integer('StdSer_CrtYrTtl')->nullable();
            $table->integer('StdServ_SalWages')->nullable();
            $table->integer('StdServ_EmpFringeBft')->nullable();
            $table->integer('StdServ_Ops_MaintOfPlant')->nullable();
            $table->integer('StdServ_Dep')->nullable();
            $table->integer('StdServ_Int')->nullable();
            $table->integer('StdServ_AllOther')->nullable();
            $table->integer('InstSup_CrtYrTtl')->nullable();
            $table->integer('InsSup_SalWages')->nullable();
            $table->integer('InstSup_EmpFringeBft')->nullable();
            $table->integer('InstSup_Ops_MaintOfPlant')->nullable();
            $table->integer('InstSup_Dep')->nullable();
            $table->integer('InstSup_Int')->nullable();
            $table->integer('InstSup_AllOther')->nullable();
            $table->integer('OpMaintOfPlant_CrtYrTtl')->nullable();
            $table->integer('OpMaintOfPlant_SalWages')->nullable();
            $table->integer('OpMaintOfPlant_EmpFringeBft')->nullable();
            $table->integer('OpMaintOfPlant')->nullable();
            $table->integer('OpMaintOfPlant_Dep')->nullable();
            $table->integer('OpMaintOfPlant_Int')->nullable();
            $table->integer('OpMaintOfPlant_AllOther')->nullable();
            $table->integer('Sch_felshpsExp_CrtYrTtl')->nullable();
            $table->integer('Sch_felshpsExp_AllOther')->nullable();
            $table->integer('AuxEtr_CrtYrTtl')->nullable();
            $table->integer('AuxEtr_SalWages')->nullable();
            $table->integer('AuxErt_EmpFringeBft')->nullable();
            $table->integer('AuxEtr_Ops_MaintOfPlant')->nullable();
            $table->integer('AuxEtr_Dep')->nullable();
            $table->integer('AuxEtr_Int')->nullable();
            $table->integer('AuxEtr_AllOther')->nullable();
            $table->integer('HspSer_CrtYrTtl')->nullable();
            $table->integer('HspSer_SalWages')->nullable();
            $table->integer('HspSer_EmpFringeBft')->nullable();
            $table->integer('HspSer_Ops_MaintOfPlant')->nullable();
            $table->integer('HspSer_Dep')->nullable();
            $table->integer('HspSer_Int')->nullable();
            $table->integer('HspSer_AllOther')->nullable();
            $table->integer('IndOps_CrtYrTtl')->nullable();
            $table->integer('IndOps_SalWages')->nullable();
            $table->integer('IndOps_EmpFringeBft')->nullable();
            $table->integer('IndOps_Ops_MaintOfPlant')->nullable();
            $table->integer('IndOps_Dep')->nullable();
            $table->integer('IndOps_Int')->nullable();
            $table->integer('IndOps_AllOther')->nullable();
            $table->integer('OtherExpDed_CrtYrTtl')->nullable();
            $table->integer('OtherExpDed_SalWages')->nullable();
            $table->integer('OtherExpDed_EmpFringeBft')->nullable();
            $table->integer('OtherExpDed_Ops_MaintOfPlant')->nullable();
            $table->integer('OtherExpDed_Dep')->nullable();
            $table->integer('OtherExpDed_Int')->nullable();
            $table->integer('OtherExpDed_AllOther')->nullable();
            $table->integer('TtlExpDed_CrtYrTtl')->nullable();
            $table->integer('TtlExpDed_SalWages')->nullable();
            $table->integer('TtlExpDed_EmpFringeBft')->nullable();
            $table->integer('TtlExpDed_Ops_MaintOfPlant')->nullable();
            $table->integer('TtlExpDed_Dep')->nullable();
            $table->integer('TtlExpDed_Int')->nullable();
            $table->integer('TtlExpDed_AllOther')->nullable();
            $table->integer('TtlRev_OtherAdn')->nullable();
            $table->integer('TtlExp_OtherDed')->nullable();
            $table->integer('CngNet_PstdrgYr')->nullable();
            $table->integer('NetPostnBegnOfYr')->nullable();
            $table->integer('AdjBegnNetPostn')->nullable();
            $table->integer('NetPostnEndYr')->nullable();
            $table->integer('PellGrntFederal')->nullable();
            $table->integer('GrntStateGovt')->nullable();
            $table->integer('GrntLclGovt')->nullable();
            $table->integer('InstGrntFrmResRrs')->nullable();
            $table->integer('InstGrntFrmUnResRrs')->nullable();
            $table->integer('TtlGrSch_felshp')->nullable();
            $table->integer('Dis_AlsApplTtn_fees')->nullable();
            $table->integer('Dis_AlwAplSls_SerAuxEtr')->nullable();
            $table->integer('TtlDis_Alw')->nullable();
            $table->integer('NetSch_felshpExp')->nullable();
            /*$table->char('X_Inst_EmpFringeBenft',5)->nullable();
            $table->char('X_Inst_Ops_MaintOfPlant',5)->nullable();
            $table->char('X_Inst_Dep',5)->nullable();
            $table->char('X_Inst_Interest',5)->nullable();
            $table->char('X_Instruction _ AllOther',5)->nullable();
            $table->char('X_Res_CrtYrTtl',5)->nullable();
            $table->char('X_Res_SalWages',5)->nullable();
            $table->char('X_Res_EmpFringeBft',5)->nullable();
            $table->char('X_Res_Ops_MaintOfPlant',5)->nullable();
            $table->char('X_Res_Dep',5)->nullable();
            $table->char('X_Res_Interest',5)->nullable();
            $table->char('X_Res_AllOther',5)->nullable();
            $table->char('X_PubServ_CrtYrTtl',5)->nullable();
            $table->char('X_PubServ_SalWages',5)->nullable();
            $table->char('X_PubServ_EmpFringeBft',5)->nullable();
            $table->char('X_PubServ_Ops_MaintOfPlant',5)->nullable();
            $table->char('X_PubServ_Dep',5)->nullable();
            $table->char('X_PubServ_Interest',5)->nullable();
            $table->char('X_PubServ _ AllOther',5)->nullable();
            $table->char('X_AcdSup_CrtYrTtl',5)->nullable();
            $table->char('X_AcadSup_SalWages',5)->nullable();
            $table->char('X_AcadSup_EmpFringeBft',5)->nullable();
            $table->char('X_AcadSup_Ops_MaintOfPlant',5)->nullable();
            $table->char('X_AcadSup_Dep',5)->nullable();
            $table->char('X_AcadSup_Int',5)->nullable();
            $table->char('X_AcadSup_AllOther',5)->nullable();
            $table->char('X_StdSer_CrtYrTtl',5)->nullable();
            $table->char('X_StdServ_SalWages',5)->nullable();
            $table->char('X_StdServ_EmpFringeBft',5)->nullable();
            $table->char('X_StdServ_Ops_MaintOfPlant',5)->nullable();
            $table->char('X_StdServ_Dep',5)->nullable();
            $table->char('X_StdServ_Int',5)->nullable();
            $table->char('X_StdServ_AllOther',5)->nullable();
            $table->char('X_InstSup_CrtYrTtl',5)->nullable();
            $table->char('X_InsSup_SalWages',5)->nullable();
            $table->char('X_InstSup_EmpFringeBft',5)->nullable();
            $table->char('X_InstSup_Ops_MaintOfPlant',5)->nullable();
            $table->char('X_InstSup_Dep',5)->nullable();
            $table->char('X_InstSup_Int',5)->nullable();
            $table->char('X_InstSup_AllOther',5)->nullable();
            $table->char('X_OpMaintOfPlant_CrtYrTtl',5)->nullable();
            $table->char('X_OpMaintOfPlant_SalWages',5)->nullable();
            $table->char('X_OpMaintOfPlant_EmpFringeBft',5)->nullable();
            $table->char('X_OpMaintOfPlant',5)->nullable();
            $table->char('X_OpMaintOfPlant_Dep',5)->nullable();
            $table->char('X_OpMaintOfPlant_Int',5)->nullable();
            $table->char('X_OpMaintOfPlant_AllOther',5)->nullable();
            $table->char('X_Sch_felshpsExp_CrtYrTtl',5)->nullable();
            $table->char('X_Sch_felshpsExp_AllOther',5)->nullable();
            $table->char('X_AuxEtr_CrtYrTtl',5)->nullable();
            $table->char('X_AuxEtr_SalWages',5)->nullable();
            $table->char('X_AuxErt_EmpFringeBft',5)->nullable();
            $table->char('X_AuxEtr_Ops_MaintOfPlant',5)->nullable();
            $table->char('X_AuxEtr_Dep',5)->nullable();
            $table->char('X_AuxEtr_Int',5)->nullable();
            $table->char('X_AuxEtr_AllOther',5)->nullable();
            $table->char('X_HspSer_CrtYrTtl',5)->nullable();
            $table->char('X_HspSer_SalWages',5)->nullable();
            $table->char('X_HspSer_EmpFringeBft',5)->nullable();
            $table->char('X_HspSer_Ops_MaintOfPlant',5)->nullable();
            $table->char('X_HspSer_Dep',5)->nullable();
            $table->char('X_HspSer_Int',5)->nullable();
            $table->char('X_HspSer_AllOther',5)->nullable();
            $table->char('X_IndOps_CrtYrTtl',5)->nullable();
            $table->char('X_IndOps_SalWages',5)->nullable();
            $table->char('X_IndOps_EmpFringeBft',5)->nullable();
            $table->char('X_IndOps_Ops_MaintOfPlant',5)->nullable();
            $table->char('X_IndOps_Dep',5) ->nullable();
            $table->char('X_IndOps_Int',5) ->nullable();
            $table->char('X_IndOps_AllOther',5) ->nullable();
            $table->char('X_OtherExpDed_CrtYrTtl',5) ->nullable();
            $table->char('X_OtherExpDed_SalWages',5) ->nullable();
            $table->char('X_OtherExpDed_EmpFringeBft',5) ->nullable();
            $table->char('X_OtherExpDed_Ops_MaintOfPlant',5) ->nullable();
            $table->char('X_OtherExpDed_Dep',5) ->nullable();
            $table->char('X_OtherExpDed_Int',5) ->nullable();
            $table->char('X_OtherExpDed_AllOther',5) ->nullable();
            $table->char('X_TtlExpDed_CrtYrTtl',5) ->nullable();
            $table->char('X_TtlExpDed_SalWages',5) ->nullable();
            $table->char('X_TtlExpDed_EmpFringeBft',5) ->nullable();
            $table->char('X_TtlExpDed_Ops_MaintOfPlant',5) ->nullable();
            $table->char('X_TtlExpDed_Dep',5) ->nullable();
            $table->char('X_TtlExpDed_Int',5) ->nullable();
            $table->char('X_TtlExpDed_AllOther',5) ->nullable();
            $table->char('X_TtlRev_OtherAdn',5) ->nullable();
            $table->char('X_TtlExp_OtherDed',5) ->nullable();
            $table->char('X_CngNet_PstdrgYr',5) ->nullable();
            $table->char('X_NetPostnBegnOfYr',5) ->nullable();
            $table->char('X_AdjBegnNetPostn',5) ->nullable();
            $table->char('X_NetPostnEndYr',5) ->nullable();
            $table->char('X_PellGrntFederal',5) ->nullable();
            $table->char('X_GrntStateGovt',5) ->nullable();
            $table->char('X_GrntLclGovt',5) ->nullable();
            $table->char('X_InstGrntFrmResRrs',5) ->nullable();
            $table->char('X_InstGrntFrmUnResRrs',5) ->nullable();
            $table->char('X_TtlGrSch_felshp',5) ->nullable();
            $table->char('X_Dis_AlsApplTtn_fees',5) ->nullable();
            $table->char('X_Dis_AlwAplSls_SerAuxEtr',5) ->nullable();
            $table->char('X_TtlDis_Alw',5) ->nullable();
            $table->char('X_NetSch_felshpExp',5) ->nullable();*/
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
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
        Schema::dropIfExists('publics');
    }
}
