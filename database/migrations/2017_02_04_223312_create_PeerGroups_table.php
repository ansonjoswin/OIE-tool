<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peergroups', function (Blueprint $table) {

            $table->increments('PeerGroupID');
            $table->integer('User_ID')->unsigned();
            $table->string('PeerGroupName')->nullable();
            $table->string('PriPubFlg')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
			$table->timestamps();
            $table->softDeletes();
            $table->foreign('User_ID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peergroups');
    }
}
