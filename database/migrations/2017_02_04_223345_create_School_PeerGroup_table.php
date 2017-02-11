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

            $table->increments('School_PeerGroup_ID');
            //$table->primary(array('PeerGroupID','School_Id'));
            $table->integer('School_Id')->unsigned();
            $table->integer('PeerGroupID')->unsigned();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('School_Id')->references('School_Id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('PeerGroupID')->references('PeerGroupID')->on('peer_Groups')->onUpdate('cascade')->onDelete('cascade');

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
