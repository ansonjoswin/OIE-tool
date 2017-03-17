<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDummyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                Schema::create('dummy', function (Blueprint $table) {
            // School Table Attributes
            $table->bigIncrements('school_id');
            $table->bigInteger('unit_id');
            $table->string('school_name');
            $table->string('school_city');
            $table->string('school_state');
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
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
        Schema::drop('dummy');
        }
}
