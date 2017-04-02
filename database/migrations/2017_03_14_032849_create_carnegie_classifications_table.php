<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarnegieClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carnegie_classifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('school_id')->index();
            $table->integer('year')->index();
            $table->integer('carnegie_basic')->nullable();
            $table->float('carnegie_ug_program')->nullable();
            $table->float('carnegie_grad_program')->nullable();
            $table->float('carnegie_ug_profile')->nullable();
            $table->float('carnegie_enroll_profile')->nullable();
            $table->char('carnegie_size_setting')->nullable();
            $table->float('carnegie_classification2000')->nullable();
            $table->unique(['school_id', 'year']);
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->useCurrent();
			      $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
          //  $table->primary(['school_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carnegie_classifications');
    }
}
