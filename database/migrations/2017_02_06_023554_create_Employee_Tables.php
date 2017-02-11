<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            //

            //$table->primary(['year'],['school_id'])->nullable();
            
            $table->increments('E_ID');
            $table->bigInteger('School_Id')->unsigned();
            $table->integer('year')->nullable();
            $table->integer('Occup_FTPT')->nullable();
            $table->integer('FTPT_status')->nullable();
            $table->string('Occup_Ctry')->nullable();
            $table->integer('PrevCode_Occup')->nullable();
            $table->integer('Emp_Ttl')->nullable();
            $table->integer('Emp_Ttl_M')->nullable();
            $table->integer('Emp_Ttl_W')->nullable();
            $table->integer('Emp_Amer-Ind_or_AK_Ttl')->nullable();
            $table->integer('Emp_Amer-Ind_or_AK_M')->nullable();
            $table->integer('Emp_Amer-Ind_or_AK_W')->nullable();
            $table->integer('Emp_Asian_Ttl')->nullable();
            $table->integer('Emp_Asian_M')->nullable();
            $table->integer('Emp_Asian_W')->nullable();
            $table->integer('Emp_Blk_or_Afro_Amer_Ttl')->nullable();
            $table->integer('Emp_Blk_or_Afro_Amer_M')->nullable();
            $table->integer('Emp_Blk_or_Afro_Amer_W')->nullable();
            $table->integer('Emp_Hispo_or_Latino_Ttl')->nullable();
            $table->integer('Emp_Hispo_or_Latino_M')->nullable();
            $table->integer('Emp_Hispo_or_Latino')->nullable();
            $table->integer('Emp_Haw_or_Pacific_Ttl')->nullable();
            $table->integer('Emp_Haw_or_Pacific_M')->nullable();
            $table->integer('Emp_Haw_or_Pacific_W')->nullable();
            $table->integer('Emp_White_Ttl')->nullable();
            $table->integer('Emp_White_M')->nullable();
            $table->integer('Emp_White_W')->nullable();
            $table->integer('Emp_Two_or_more_race_Ttl')->nullable();
            $table->integer('Emp_Two_or_more_race_M')->nullable();
            $table->integer('Emp_Two_or_more_race_W')->nullable();
            $table->integer('Emp_Race_UNTtl')->nullable();
            $table->integer('Emp_Race_UNTtl_M')->nullable();
            $table->integer('Emp_Race_UNTtl_W')->nullable();
            $table->integer('Emp_NR_Alien_Ttl')->nullable();
            $table->integer('Emp_NR_Alien_Ttl_M')->nullable();
            $table->integer('Emp_NR_Alien_Ttl_W')->nullable();
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
        Schema::drop('employees');
    }
}
