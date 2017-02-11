<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defaultrates', function (Blueprint $table) {

            $table->primary('OPE_ID');
            $table->bigInteger('OPE_ID');
            $table->integer('School_ID')->unsigned();
            $table->string('State_Desc')->nullable();
            $table->integer('year')->nullable();
            $table->integer('Pgm_Len')->nullable();
            $table->integer('School_Type')->nullable();
            $table->integer('EthnicCode')->nullable();
            $table->string('CongDis')->nullable();
            $table->integer('Region')->nullable();
            $table->integer('AvgOrGrtTh30')->nullable();
            $table->char('RateType')->nullable();
            $table->integer('Cohort_Year')->nullable();
            $table->integer('NumBorDeft')->nullable();
            $table->integer('NumBorRpy')->nullable();
            $table->float('DefRate')->nullable();
            $table->char('Prate')->nullable();
            $table->string('School_State')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('School_ID')->references('School_ID')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('School_State')->references('School_State')->on('School')->onUpdate('cascade')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('defaultrates');
    }
}
