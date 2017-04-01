<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('defaultrates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('opeid')->unsigned();
            $table->integer('year')->index();
            $table->float('loan_default_rate')->nullable();
            $table->unique(['opeid', 'year']);
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
            $table->foreign('opeid')->references('opeid')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('School_State')->references('School_State')->on('School')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('defaultrates');
    }
}
