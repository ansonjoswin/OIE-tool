<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryCompletionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_completions', function (Blueprint $table) {
            // School Table Attributes
            $table->integer('Completions_ID')->unsigned();
            $table->foreign('Completions_ID')->references('Completions_ID')->on('completions')->onUpdate('cascade')->onDelete('cascade');
            $table->string('varname')->nullable();
            $table->string('Dictionary_Completions')->nullable();
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
        Schema::dropIfExists('dictionary_completions');
    }
}
