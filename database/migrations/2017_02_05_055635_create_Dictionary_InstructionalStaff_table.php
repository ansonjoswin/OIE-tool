<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryInstructionalStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_instructionalstaffs', function (Blueprint $table) {
            // School Table Attributes
            $table->integer('InstructionalES_ID')->unsigned();
            $table->foreign('InstructionalES_ID')->references('InstructionalES_ID')->on('instructional_ess')->onUpdate('cascade')->onDelete('cascade');
            $table->string('varname')->nullable();
            $table->string('Dictionary_InstructionalStaff')->nullable();
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
        Schema::dropIfExists('dictionary_instructionalstaffs');
    }
}
