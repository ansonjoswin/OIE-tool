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
            $table->integer('School_ID')->unsigned();
            $table->integer('PeerGroupID')->unsigned();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->foreign('School_ID')->references('School_Id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
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
