<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatatable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatable', function(Blueprint $table)
        {
            $table->string('id');
            $table->integer('school_id')->index();
            $table->string('school_name');
            $table->integer('ug_headcount')->nullable();
            $table->integer('admin_count')->nullable();
            $table->integer('inst_count')->nullable();
            $table->float('admin_sal')->nullable();
            $table->float('inst_sal')->nullable();
            $table->integer('admin_stu')->nullable();
            $table->integer('inst_stu')->nullable();
            $table->double('grad_rate4')->nullable();
            $table->double('grad_rate6')->nullable();
            $table->integer('deg_stu')->nullable();
            $table->float('avg_sch_stu')->nullable();
            $table->float('loan_rate')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');  
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('datatable');
    }
}
