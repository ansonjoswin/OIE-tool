<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryUGUnduplicatedHeadcountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_ugunduplicatedheadcounts', function (Blueprint $table) {
            // School Table Attributes
            $table->integer('UG_UndupHdcnt_ID')->unsigned();
            $table->string('varname')->nullable();
            $table->string('Dictionary_UGUnduplicatedHeadcount')->nullable();
            $table->string('Column_Names')->nullable();
            $table->foreign('UG_UndupHdcnt_ID')->references('UG_UndupHdcnt_ID')->on('ug_unduplicatedheadcounts')->onUpdate('cascade')->onDelete('cascade');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dictionary_ugunduplicatedheadcounts');
    }
}
