<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryPrivateProfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_private_profs', function (Blueprint $table) {

            $table->integer('PrivateProf_ID')->unsigned();
            $table->string('varname')->nullable();
            $table->string('Dictionary_Private_NonProf')->nullable();
            $table->string('Column_Name')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('PrivateProf_ID')->references('PrivateProf_ID')->on('private_profs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dictionary_private_profs');
    }
}
