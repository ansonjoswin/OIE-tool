<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_comment_id')->index();
            $table->integer('is_active')->default(1);
            $table->string('author');
            $table->string('email');
            $table->text('comment_text');
            $table->timestamps();

            $table->foreign('user_comment_id')->references('id')->on('user_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply_comments');
    }
}
