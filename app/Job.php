<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // 
    protected $fillable=[
        'id',
        'queue',
        'payload',
        'attempts',
        'reserved_at',
        'available_at',
        'created_at'
    ];
}
