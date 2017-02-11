<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryDefaultRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_defaultrates', function (Blueprint $table) {

            $table->integer('OPE_ID')->unsigned();
            $table->string('varname')->nullable();
            $table->string('Dictionary_DefaultRate')->nullable();
            $table->string('Column_Names')->nullable();
            $table->foreign('OPE_ID')->references('OPE_ID')->on('defaultrates')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('dictionary_defaultrates');
    }
}
