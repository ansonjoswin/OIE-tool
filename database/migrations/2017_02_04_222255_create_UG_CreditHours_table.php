<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUGCreditHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ug_credithours', function (Blueprint $table) {
            //
            $table->Increments('UG_CreditHours_ID');
            $table->integer('School_ID')->unsigned();
            $table->integer('Year')->nullable();
            //$table->char('X_Twelve_Mnt_UG_credit_hrs')->nullable();
            $table->bigInteger('Twelve_Mnt_UG_credit_hrs')->nullable();
            //$table->char('X_Twelve_Mnt_UG_contact_hrs')->nullable();
            $table->bigInteger('Twelve_Mnt_UG_contact_hrs')->nullable();
            //$table->char('X_Twelve_Mnt_PG_credit_hrs')->nullable();
            $table->bigInteger('Twelve_Mnt_PG_credit_hrs')->nullable();
            //$table->char('X_Estimate_FTE_UG_yr')->nullable();
            $table->bigInteger('Estimate_FTE_UG_yr')->nullable();
            //$table->char('X_Estimate_FTE_PG_yr')->nullable();
            $table->bigInteger('Estimate_FTE_PG_yr')->nullable();
            //$table->char('X_Reported_FTE_UG_yr')->nullable();
            $table->bigInteger('Reported_FTE_UG_yr')->nullable();
            //$table->char('X_Reported_FTE_PG_yr')->nullable();
            $table->bigInteger('Reported_FTE_PG_yr')->nullable();
            //$table->char('X_Reported_FTE_Dr_yr')->nullable();
            $table->bigInteger('Reported_FTE_Dr_yr')->nullable();
            $table->bigInteger('Inst_Activity_Type')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->foreign('School_ID')->references('School_ID')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            //$table->primary('UG_CreditHours_ID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ug_credithours');
    }
}
