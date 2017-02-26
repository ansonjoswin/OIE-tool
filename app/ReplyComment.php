<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    //

    protected $fillable = [

						'comment_id',
						'comment_text',
						'author',
						'email',
						'is_active'

					];


	public function usercomment(){
		return this->belongsTo('App\UserComment');
	}



}
