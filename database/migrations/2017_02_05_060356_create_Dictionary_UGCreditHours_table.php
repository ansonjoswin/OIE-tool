<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryUGCreditHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_ugcredithours', function (Blueprint $table) {
            // School Table Attributes
            $table->integer('UG_CreditHours_ID')->unsigned();
            $table->string('varname')->nullable();
            $table->string('Dictionary_UGCreditHours')->nullable();
            $table->string('Column_Names')->nullable();
            $table->foreign('UG_CreditHours_ID')->references('UG_CreditHours_ID')->on('ug_credithours')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('dictionary_ugcredithours');
    }
}
