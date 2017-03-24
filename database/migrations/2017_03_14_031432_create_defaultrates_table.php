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
            $table->integer('opeid')->index();
            $table->integer('year')->index();
            $table->float('default_rate1')->nullable();
            $table->float('default_rate2')->nullable();
            $table->float('default_rate3')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
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
