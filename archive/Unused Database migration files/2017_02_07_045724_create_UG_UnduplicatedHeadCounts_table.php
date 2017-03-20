<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUGUnduplicatedHeadCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ug_unduplicatedheadcounts', function (Blueprint $table) {
            //
            $table->Increments('UG_UndupHdcnt_ID');
            $table->integer('School_ID')->unsigned();
            $table->integer('Dgr_Lvl_Enrl')->nullable();
            $table->integer('Year')->nullable();
            $table->integer('Dgr_Lvl_Cmpd')->nullable();
            //$table->char('X_UG_Ttl_Enrl')->nullable();
            $table->integer('UG_Ttl_Enrl')->nullable();
            //$table->char('X_UG_Ttl_M_Enrl')->nullable();
            $table->integer('UG_Ttl_M_Enrl')->nullable();
            //$table->char('X_UG_Ttl_F_Enrl')->nullable();
            $table->integer('UG_Ttl_F_Enrl')->nullable();
            //$table->char('X_UG_Amer_Ind_or_Alk_Ttl')->nullable();
            $table->integer('UG_Amer_Ind_or_Alk_Ttl')->nullable();
            //$table->char('X_UG_Amer_Ind_or_Alk_M')->nullable();
            $table->integer('UG_Amer_Ind_or_Alk_M')->nullable();
            //$table->char('X_UG_Amer_Ind_or_Alk_F')->nullable();
            $table->integer('UG_Amer_Ind_or_Alk_F')->nullable();
            //$table->char('X_UG_Asian_Ttl')->nullable();
            $table->integer('UG_Asian_Ttl')->nullable();
            //$table->char('X_UG_Asian_M')->nullable();
            $table->integer('UG_Asian_M')->nullable();
            //$table->char('X_UG_Asian_F')->nullable();
            $table->integer('UG_Asian_F')->nullable();
            //$table->char('X_UG_Blk_or_Afro_Amer_Ttl')->nullable();
            $table->integer('UG_Blk_or_Afro_Amer_Ttl')->nullable();
            //$table->char('X_UG_Blk_or_Afro_Amer_M')->nullable();
            $table->integer('UG_Blk_or_Afro_Amer_M')->nullable();
            // $table->char('X_UG_Blk_or_Afro_Amer_F')->nullable();
            $table->integer('UG_Blk_or_Afro_Amer_F')->nullable();
            //$table->char('X_UG_Hispo_or_Lat_Ttl')->nullable();
            $table->integer('UG_Hispo_or_Lat_Ttl')->nullable();
            // $table->char('X_UG_Hispo_or_Lat_M')->nullable();
            $table->integer('UG_Hispo_or_Lat_M')->nullable();
            //$table->char('X_UG_Hispo_or_Lat_F')->nullable();
            $table->integer('UG_Hispo_or_Lat_F')->nullable();
            //$table->char('X_UG_HW_or_PAC_Ttl')->nullable();
            $table->integer('UG_HW_or_PAC_Ttl')->nullable();
            // $table->char('X_UG_HW_or_PAC_M')->nullable();
            $table->integer('UG_HW_or_PAC_M')->nullable();
            //$table->char('X_UG_HW_or_PAC_F')->nullable();
            $table->integer('UG_HW_or_PAC_F')->nullable();
            //$table->char('X_UG_WHT_Ttl')->nullable();
            $table->integer('UG_WHT_Ttl')->nullable();
            //$table->char('X_UG_WHT_M')->nullable();
            $table->integer('UG_WHT_M')->nullable();
            //$table->char('X_UG_WHT_F')->nullable();
            $table->integer('UG_WHT_F')->nullable();
            //$table->char('X_UG_Two_or_more_race_Ttl')->nullable();
            $table->integer('UG_TwoOrMore_RaceTtl')->nullable();
            // $table->char('X_UG_Two_or_more_race_M')->nullable();
            $table->integer('UG_TwoOrMore_RaceM')->nullable();
            //$table->char('X_UG_Two_or_more_race_F')->nullable();
            $table->integer('UG_TwoOrMore_RaceF')->nullable();
            //$table->char('X_UG_Race_UK_Ttl')->nullable();
            $table->integer('UG_Race_UK_Ttl')->nullable();
            //$table->char('X_UG_Race_UK_M')->nullable();
            $table->integer('UG_Race_UK_M')->nullable();
            // $table->char('X_UG_Race_UK_F')->nullable();
            $table->integer('UG_Race_UK_F')->nullable();
            //$table->char('X_UG_NR_Alien_Ttl')->nullable();
            $table->integer('UG_NR_Alien_Ttl')->nullable();
            //$table->char('X_UG_NR_Alien_M')->nullable();
            $table->integer('UG_NR_Alien_M')->nullable();
            //$table->char('X_UG_NR_Alien_F')->nullable();
            $table->integer('UG_NR_Alien_F')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->foreign('School_Id')->references('School_Id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            //$table->primary('UG_UndupHdcnt_ID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ug_unduplicatedheadcounts');
    }
}
