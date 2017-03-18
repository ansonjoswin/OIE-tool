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

            $table->increments('peergroup_id');
            $table->integer('user_id')->unsigned();
            $table->string('peergroup_name')->nullable();
            $table->string('private_public_flag')->nullable();
            $table->string('created_by')->default('System');
            $table->string('updated_by')->default('System');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable(); 

            // $table->increments('PeerGroupID');
            // $table->integer('User_ID')->unsigned();
            // $table->string('PeerGroupName')->nullable();
            // $table->string('PriPubFlg')->nullable();
            // $table->string('created_by')->default('System');
            // $table->string('updated_by')->default('System');         
        });

//creating a pivot table --> peergroups, schools -> peergroup_school
        Schema::create('peergroup_school', function (Blueprint $table) {

                $table->increments('id');

                $table->integer('peergroup_id')->unsigned()->index();
                $table->foreign('peergroup_id')->references('peergroup_id')->on('peergroups')->onUpdate('cascade')->onDelete('cascade');

                $table->integer('school_id')->unsigned()->index();
                $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');


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
        Schema::dropIfExists('peergroups');
        Schema::dropIfExists('peergroup_school');
    }
}
