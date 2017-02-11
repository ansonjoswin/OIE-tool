<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryPublicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_publics', function (Blueprint $table) {

            $table->integer('Public_ID')->unsigned();
            $table->foreign('Public_ID')->references('Public_ID')->on('publics')->onUpdate('cascade')->onDelete('cascade');
            $table->string('varname')->nullable();
            $table->string('Dictionary_Public')->nullable();
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
        Schema::dropIfExists('dictionary_publics');
    }
}
