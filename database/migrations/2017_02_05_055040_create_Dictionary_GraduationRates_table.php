<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryGraduationRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_graduationrates', function (Blueprint $table) {
            // School Table Attributes
            $table->integer('Graduation_ID')->unsigned();
            $table->string('varname')->nullable();
            $table->string('Dictionary_GraduationRates')->nullable();
            $table->string('Column_Names')->nullable();
            $table->foreign('Graduation_ID')->references('Graduation_ID')->on('graduations')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('dictionary_graduationrates');
    }
}
