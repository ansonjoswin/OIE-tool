<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    //

    protected $fillable = [

						'user_comment_id',
						'comment_text',
						'author',
						'email',
						'is_active'

					];


	public function comments(){
		return $this->belongsTo('App\UserComment');
	}



}
