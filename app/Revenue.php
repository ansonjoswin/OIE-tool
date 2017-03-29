<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = [
        'year', 'tution_and_fees', 'state_appropriations', 'local_appropriations',
        'government_grants_and_contracts', 'private_gifts_grants_and_contracts',
        'investment_return', 'other_revenues', 'school_id'
    ];

    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
