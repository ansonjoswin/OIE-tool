<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'year', 'degree_type', 'total', 'men', 'women', 'part_time_total', 'part_time_men', 'part_time_women', 'full_time_total', 'full_time_men', 'full_time_women', 'school_id'
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
