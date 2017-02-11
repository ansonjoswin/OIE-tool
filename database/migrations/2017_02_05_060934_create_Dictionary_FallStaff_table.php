<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryFallStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_fallstaffs', function (Blueprint $table) {
            // School Table Attributes
            $table->integer('E_ID')->unsigned();
            $table->string('varname')->nullable();
            $table->string('Dictionary_FallStaff')->nullable();
            $table->string('Column_Names')->nullable();
            $table->foreign('E_ID')->references('E_ID')->on('employees')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('dictionary_fallstaffs');
    }
}
