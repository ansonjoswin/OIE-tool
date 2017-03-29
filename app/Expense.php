<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'year', 'instruction', 'research', 'public_service', 'academic_support', 'institutional_support',
        'student_services', 'other_expenses', 'school_id'
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
