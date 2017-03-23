<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummaryTable extends Migration
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
            $table->increments('id');
            $table->integer('ug_headcount');
            $table->integer('admin_count');
            $table->integer('inst_count');
            $table->integer('admin_sal');
            $table->integer('inst_sal');
            $table->integer('admin_stu');
            $table->integer('inst_stu');
            $table->integer('grad_rate4');
            $table->integer('grad_rate6');
            $table->integer('deg_stu');
            $table->integer('avg_sch_stu');
            $table->integer('loan_rate');
            $table->timestamps();
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
