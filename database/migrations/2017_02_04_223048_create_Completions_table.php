<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completions', function (Blueprint $table) {
            //
            $table->increments('Completions_ID');
            $table->integer('School_Id');
            $table->integer('year')->nullable();
            $table->integer('InsPgCode')->nullable();
            $table->integer('MajNum')->nullable();
            $table->integer('AwardLvl')->nullable();
            //$table->char('X_GrandTtl')->nullable();
            $table->integer('GrandTtl')->nullable();
            //$table->char('X_Ttl_M')->nullable();
            $table->integer('Ttl_M')->nullable();
            //$table->char('X_Ttl_W')->nullable();
            $table->integer('Ttl_W')->nullable();
            //$table->char('X_TtlAmeInd_AlsNat')->nullable();
            $table->integer('TtlAmeInd_AlsNat')->nullable();
            //$table->char('X_Ttl_M_AmeInd_AlsNat')->nullable();
            $table->integer('Ttl_M_AmeInd_AlsNat')->nullable();
            //$table->char('X_Ttl_W_AmeInd_AlsNat')->nullable();
            $table->integer('Ttl_W_AmeInd_AlsNat')->nullable();
            //$table->char('X_TtlAsian')->nullable();
            $table->integer('TtlAsian')->nullable();
            //$table->char('X_Ttl_M_Asian')->nullable();
            $table->integer('Ttl_M_Asian')->nullable();
            //$table->char('X_Ttl_W_Asian')->nullable();
            $table->integer('Ttl_W_Asian')->nullable();
            //$table->char('X_Ttl_AfrAme')->nullable();
            $table->integer('Ttl_AfrAme')->nullable();
            //$table->char('X_Ttl_M_AfrAme')->nullable();
            $table->integer('Ttl_M_AfrAme')->nullable();
            //$table->char('X_Ttl_W_AfrAme')->nullable();
            $table->integer('Ttl_W_AfrAme')->nullable();
            //$table->char('X_TtlHisLat')->nullable();
            $table->integer('TtlHisLat')->nullable();
            //$table->char('X_Ttl_M_HisLat')->nullable();
            $table->integer('Ttl_M_HisLat')->nullable();
            //$table->char('X_Ttl_W_HisLat')->nullable();
            $table->integer('Ttl_W_HisLat')->nullable();
            //$table->char('X_Ttl_NaHwn_PacIsd')->nullable();
            $table->integer('Ttl_NaHwn_PacIsd')->nullable();
            //$table->char('X_Ttl_M_NaHwn_PacIsd')->nullable();
            $table->integer('Ttl_M_NaHwn_PacIsd')->nullable();
           // $table->char('X_Ttl_W_NaHwn_PacIsd')->nullable();
            $table->integer('Ttl_W_NaHwn_PacIsd')->nullable();
            //$table->char('X_Ttl_White')->nullable();
            $table->integer('Ttl_White')->nullable();
            //$table->char('X_Ttl_M_White')->nullable();
            $table->integer('Ttl_M_White')->nullable();
            //$table->char('X_Ttl_W_White')->nullable();
            $table->integer('Ttl_W_White')->nullable();
            //$table->char('X_Ttl_TwoorMoreRaces')->nullable();
            $table->integer('Ttl_TwoorMoreRaces')->nullable();
            //$table->char('X_Ttl_M_TwoorMoreRaces')->nullable();
            $table->integer('Ttl_M_TwoorMoreRaces')->nullable();
            //$table->char('X_Ttl_W_TwoorMoreRaces')->nullable();
            $table->integer('Ttl_W_TwoorMoreRaces')->nullable();
            //$table->char('X_Ttl_RaUn')->nullable();
            $table->integer('Ttl_RaUn')->nullable();
            //$table->char('X_Ttl_M_RaUn')->nullable();
            $table->integer('Ttl_M_RaUn')->nullable();
            //$table->char('X_Ttl_W_RaUn')->nullable();
            $table->integer('Ttl_W_RaUn')->nullable();
            //$table->char('X_Ttl_alien')->nullable();
            $table->integer('Ttl_alien')->nullable();
            //$table->char('X_Ttl_M_alien')->nullable();
            $table->integer('Ttl_M_alien')->nullable();
            //$table->char('X_Ttl_W_alien')->nullable();
            $table->integer('Ttl_W_alien')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->softDeletes();
            $table->timestamps();
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
        Schema::drop('completions');
    }
}
