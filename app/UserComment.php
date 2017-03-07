<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserComment extends Model
{
    //
protected $fillable = [

'user_id','comment_text','author','email','is_active'

					];


    public function replies(){
    	return $this->hasMany('App\ReplyComment');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
