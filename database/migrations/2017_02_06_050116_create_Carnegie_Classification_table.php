<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarnegieClassificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carneige_classifications', function (Blueprint $table) {
            //
            $table->integer('School_Id');
            $table->integer('Year');
            $table->integer('Cng_2010_Basic')->nullable();
            $table->integer('Cng_2010_UGPgm')->nullable();
            $table->integer('Cng_2010_GradPgm')->nullable();
            $table->integer('Cng_2010_UGPrf')->nullable();
            $table->integer('Cng_2010_EnrollPrf')->nullable();
            $table->char('Cng_2010_SizeSetting')->nullable();
            $table->integer('Cng_2000')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('school_id')->on('schools')->onUpdate('cascade')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carneige_classifications');
    }
}

