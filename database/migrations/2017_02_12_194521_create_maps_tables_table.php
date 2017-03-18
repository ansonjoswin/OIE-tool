<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTablesTable extends Migration
{
    
    public function up()
    {
        Schema::create('map_tables', function (Blueprint $table) {
            $table->increments("id");
            $table->string('csv_name')->unique();
            $table->string('local_filename')->unique();
			$table->integer('year');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
        Schema::drop('map_tables');
    }
}
