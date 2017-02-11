<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionaryNonInstructionalStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_noninstructionalstaffs', function (Blueprint $table) {
            // School Table Attributes
            $table->integer('NonInstructionalES_ID')->unsigned();
            $table->foreign('NonInstructionalES_ID')->references('NonInstructionalES_ID')->on('noninstructional_ess')->onUpdate('cascade')->onDelete('cascade');
            $table->string('varname')->nullable();
            $table->string('Dictionary_NonInstructionalStaff')->nullable();
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
        Schema::dropIfExists('dictionary_noninstructionalstaffs');
    }
}
