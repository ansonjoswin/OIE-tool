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
            $table->bigIncrements('id');
            $table->integer('school_id')->index();
            $table->integer('year')->index();
            $table->float('public_total_salary_wage')->nullable();
            $table->float('privateprofit_total_salary_wage')->nullable();
            $table->float('private_nonprofit_total_salary_wage')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->useCurrent();
			      $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            //$table->primary(['school_id']);

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