<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryInstitutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_institutions', function (Blueprint $table) {
            // School Table Attributes
            $table->integer('School_ID')->unsigned();
            $table->string('varname')->nullable();
            $table->string('Dictionary_Institution')->nullable();
            $table->string('Column_Names')->nullable();
            $table->foreign('School_ID')->references('School_ID')->on('schools')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('dictionary_institutions');
    }
}
