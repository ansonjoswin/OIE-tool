<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->integer('school_id')->unsigned();
            $table->integer('year');
            $table->float('public_total_salary_wage')->nullable();
            $table->float('privateprofit_total_salary_wage')->nullable();
            $table->float('private_nonprofit_total_salary_wage')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['year','school_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finances');
    }
}
