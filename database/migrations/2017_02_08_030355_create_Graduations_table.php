<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraduationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduations', function (Blueprint $table) {
            //
            $table->increments('Graduation_ID');
            $table->integer('School_Id');
            $table->integer('year')->nullable();
            //$table->char('X_Rev_BacDgr_CH2006')->nullable();
            $table->integer('Rev_BacDgr_CH2006')->nullable();
            //$table->char('X_Exl_BacDgr150')->nullable();
            $table->integer('Exl_BacDgr150')->nullable();
            //$table->char('X_Adj_BacDgr150')->nullable();
            $table->integer('Adj_BacDgr150')->nullable();
            //$table->char('X_ComCNT_Bac_D100_4yr')->nullable();
            $table->integer('ComCNT_Bac_D100_4yr')->nullable();
            //$table->char('X_GradRate4yr_BacDgr100')->nullable();
            $table->integer('GradRate4yr_BacDgr100')->nullable();
            //$table->char('X_ComCNT_Bac_D150_4yr')->nullable();
            $table->integer('ComCNT_Bac_D150_4yr')->nullable();
            //$table->char('X_ComCNT_Bac_D150_6yr')->nullable();
            $table->integer('ComCNT_Bac_D150_6yr')->nullable();
            //$table->char('X_GradRate6yr_BacDgr150')->nullable();
            $table->integer('GradRate6yr_BacDgr150')->nullable();
           // $table->char('X_AdnExl_BacDgrCH')->nullable();
            $table->integer('AdnExl_BacDgrCH')->nullable();
            //$table->char('X_Adj_BacDgr200')->nullable();
            $table->integer('Adj_BacDgr200')->nullable();
            //$table->char('X_ComCNT_BD150&200')->nullable();
            $table->integer('ComCNT_BD150&200')->nullable();
            //$table->char('X_StEnrl')->nullable();
            $table->integer('StEnrl')->nullable();
            //$table->char('X_ComCNT_BD200_8yr')->nullable();
            $table->integer('ComCNT_BD200_8yr')->nullable();
            //$table->char('X_GradRate8yr_BD200')->nullable();
            $table->integer('GradRate8yr_BD200')->nullable();
           // $table->char('X_RevDgr_CerCH2010')->nullable();
            $table->integer('RevDgr_CerCH2010')->nullable();
            //$table->char('X_ExlDgr_Cer150')->nullable();
            $table->integer('ExlDgr_Cer150')->nullable();
            //$table->char('X_AdjDgr_Cer150')->nullable();
            $table->integer('AdjDgr_Cer150')->nullable();
            //$table->char('X_ComCNT_DgrCer100')->nullable();
            $table->integer('ComCNT_DgrCer100')->nullable();
           // $table->char('X_GradRate_DgrCer100')->nullable();
            $table->integer('GradRate_DgrCer100')->nullable();
            //$table->char('X_ComCNT_DgrCer150')->nullable();
            $table->integer('ComCNT_DgrCer150')->nullable();
            //$table->char('X_GradRate_DgrCer150')->nullable();
            $table->integer('GradRate_DgrCer150')->nullable();
            //$table->char('X_AdnExl_DgrCer')->nullable();
            $table->integer('AdnExl_DgrCer')->nullable();
            //$table->char('X_Adj_DgrCer200')->nullable();
            $table->integer('Adj_DgrCer200')->nullable();
            //$table->char('X_ComCNT_DgrCer50&200')->nullable();
            $table->integer('ComCNT_DgrCer50&200')->nullable();
            //$table->char('X_StEnr')->nullable();
            $table->integer('StEnr')->nullable();
            //$table->char('X_ComCNT_DgrCer200')->nullable();
            $table->integer('ComCNT_DgrCer200')->nullable();
            //$table->char('X_GradRate_DgrCer200')->nullable();
            $table->integer('GradRate_DgrCer200')->nullable();
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
        Schema::drop('graduations');
    }
}
