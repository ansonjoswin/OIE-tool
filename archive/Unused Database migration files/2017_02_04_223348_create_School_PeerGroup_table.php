<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolPeerGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_peergroups', function (Blueprint $table) {

            $table->increments('SchoolPeerGroupID');
            //$table->primary(array('PeerGroupID','School_Id'));
            $table->integer('school_id')->unsigned();
            $table->integer('PeerGroupID')->unsigned();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('PeerGroupID')->references('PeerGroupID')->on('peergroups')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_peergroups');
    }
}
