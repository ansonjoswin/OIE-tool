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
            $table->integer('school_id');
            $table->integer('year')->index();
            $table->float('carnegie_basic')->nullable();
            $table->float('carnegie_ug_program')->nullable();
            $table->float('carnegie_grad_program')->nullable();
            $table->float('carnegie_ug_profile')->nullable();
            $table->float('carnegie_enroll_profile')->nullable();
            $table->char('carnegie_size_setting')->nullable();
            $table->float('carnegie_classification2000')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['school_id']);
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
