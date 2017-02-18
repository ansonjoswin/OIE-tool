<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructionalEsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructional_ess', function (Blueprint $table){

            $table->increments('InstructionalES_ID');
            $table->integer('School_Id');
            $table->integer('year')->nullable();
            $table->integer('Acad_Rank')->nullable();
            //$table->char('X_Crt_Dur_Ttl')->nullable();
            $table->integer('Crt_Dur_Ttl')->nullable();
            //$table->char('X_Crt_Dur_M')->nullable();
            $table->integer('Crt_Dur_M')->nullable();
            //$table->char('X_Crt_Dur_W')->nullable();
            $table->integer('Crt_Dur_W')->nullable();
            //$table->char('X_Crt_Dur_9mnth_Ttl')->nullable();
            $table->integer('Crt_Dur_9mnth_Ttl')->nullable();
            // $table->char('X_Crt_Dur_9mnth_M')->nullable();
            $table->integer('Crt_Dur_9mnth_M')->nullable();
            //$table->char('X_Crt_Dur_9mnth_W')->nullable();
            $table->integer('Crt_Dur_9mnth_W')->nullable();
            //$table->char('X_Crt_Dur_10mnth_Ttl')->nullable();
            $table->integer('Crt_Dur_10mnth_Ttl')->nullable();
            //$table->char('X_Crt_Dur_10mnth_M')->nullable();
            $table->integer('Crt_Dur_10mnth_M')->nullable();
            //$table->char('X_Crt_Dur_10mnth_W')->nullable();
            $table->integer('Crt_Dur_10mnth_W')->nullable();
            //$table->char('X_Crt_Dur_11mnth_Ttl')->nullable();
            $table->integer('Crt_Dur_11mnth_Ttl')->nullable();
            //$table->char('X_Crt_Dur_11mnth_M')->nullable();
            $table->integer('Crt_Dur_11mnth_M')->nullable();
            //$table->char('X_Crt_Dur_11mnth_W')->nullable();
            $table->integer('Crt_Dur_11mnth_W')->nullable();
            // $table->char('X_Crt_Dur_12mnth_Ttl')->nullable();
            $table->integer('Crt_Dur_12mnth_Ttl')->nullable();
            //$table->char('X_Crt_Dur_12mnth_M')->nullable();
            $table->integer('Crt_Dur_12mnth_M')->nullable();
            // $table->char('X_Crt_Dur_12mnth_W')->nullable();
            $table->integer('Crt_Dur_12mnth_W')->nullable();
            //$table->char('X_Sal_Outlay_dur_Ttl')->nullable();
            $table->bigInteger('Sal_Outlay_dur_Ttl')->nullable();
            //$table->char('X_Sal_Outlay_dur_M')->nullable();
            $table->bigInteger('Sal_Outlay_dur_M')->nullable();
            //$table->char('X_Sal_Outlay_dur_W')->nullable();
            $table->bigInteger('Sal_Outlay_dur_W')->nullable();
            //$table->char('X_Sal_Outlays_Ttl')->nullable();
            $table->bigInteger('Sal_Outlays_Ttl')->nullable();
            //$table->char('X_Sal_Outlays_M')->nullable();
            $table->bigInteger('Sal_Outlays_M')->nullable();
            //$table->char('X_Sal_Outlays_W')->nullable();
            $table->bigInteger('Sal_Outlays_W')->nullable();
            // $table->char('X_Avg_Wgt_Mth_Sal_Ttl')->nullable();
            $table->bigInteger('Avg_Wgt_Mth_Sal_Ttl')->nullable();
            //$table->char('X_Avg_Wgt_Mth_Sal_M')->nullable();
            $table->bigInteger('Avg_Wgt_Mth_Sal_M')->nullable();
            //$table->char('X_Avg_Wgt_Mth_Sal_W')->nullable();
            $table->bigInteger('Avg_Wgt_Mth_Sal_W')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->foreign('School_ID')->references('School_ID')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            //$table->primary('InstructionalES_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instructional_ess');
    }
}
