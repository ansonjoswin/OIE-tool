<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryAdmissionsTestScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_admissions_testscores', function (Blueprint $table) {

            $table->integer('Admission_ID')->unsigned();
            $table->integer('Application_ID')->unsigned();
            $table->string('varname')->nullable();
            $table->string('Dictionary_Admissions_TestScores')->nullable();
            $table->string('Column_Names')->nullable();
            $table->foreign('Admission_ID')->references('Admission_ID')->on('admissions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Application_ID')->references('Application_ID')->on('applicationdetails')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('dictionary_admissions_testscores');
    }
}
