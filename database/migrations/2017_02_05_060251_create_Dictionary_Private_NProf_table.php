<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryPrivateNProfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_private_nprofs', function (Blueprint $table) {
            // School Table Attributes
            $table->integer('PrivateNProf_ID')->unsigned();
            $table->foreign('PrivateNProf_ID')->references('PrivateNProf_ID')->on('private_nprofs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('varname')->nullable();
            $table->string('Dictionary_Private_NonProfitUniv')->nullable();
            $table->string('Column_Names')->nullable();
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
        Schema::dropIfExists('dictionary_private_nprofs');
    }
}