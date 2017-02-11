<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateProfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_profs', function (Blueprint $table) {

            $table->increments('PrivateProf_ID');
            $table->integer('Finance_ID')->unsigned();
            $table->integer('TtlEquity')->nullable();
            $table->integer('TtlLiab_Equity')->nullable();
            $table->integer('Land_landImprov')->nullable();
            $table->integer('Buildings')->nullable();
            $table->integer('EquipmentArt_LibCollec')->nullable();
            $table->integer('NetOfAcmltdDeprctn')->nullable();
            $table->integer('SumOfSpecChangEquity')->nullable();
            $table->integer('NetIncm')->nullable();
            $table->integer('OtherChangesEquity')->nullable();
            $table->integer('Equity_BegnOfYr')->nullable();
            $table->integer('AdjstmntsBegnNetEquity')->nullable();
            $table->integer('Equity_endOfYr')->nullable();
            $table->integer('State_LclGrnt')->nullable();
            $table->integer('LclGovtGrnt')->nullable();
            $table->integer('InstitutionalGrnt')->nullable();
            $table->integer('Tuition_fees')->nullable();
            $table->integer('FedrlApprop_Grnt_Contrcs')->nullable();
            $table->integer('FedrlGrnt_Contrcs')->nullable();
            $table->integer('StateLclAppropGrntContrcs')->nullable();
            $table->integer('StateGrntContrcs')->nullable();
            $table->integer('LclGovtApprop')->nullable();
            $table->integer('LclGovtContrcs')->nullable();
            $table->integer('PrivateGftsGrntContrcs')->nullable();
            $table->integer('InvIncNetInc')->nullable();
            $table->integer('HospRev')->nullable();
            $table->integer('OtherRev')->nullable();
            $table->integer('FedInc_TaxExp')->nullable();
            $table->integer('State_LclIncmTaxExpns')->nullable();
            $table->integer('DesignPaidReprtTaxExpns')->nullable();
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
        Schema::dropIfExists('private_profs');
    }
}
