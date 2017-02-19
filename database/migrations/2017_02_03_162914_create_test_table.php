<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testschool', function (Blueprint $table) {
            // School Table Attributes
            $table->bigIncrements('School_Id');
            $table->bigInteger('Unit_Id');
            $table->string('School_Name')->nullable();
            $table->string('School_Address')->nullable();
            $table->string('School_City')->nullable();
            $table->string('School_State')->nullable();
            $table->integer('School_Zip')->nullable();
                        $table->double('GeoLong', 6, 3)->nullable();
            $table->double('GeoLat', 6, 3)->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
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
        //
        Schema::drop('testschool');
    }
}
