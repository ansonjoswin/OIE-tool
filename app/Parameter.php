<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'parameters';
}

    public static function getTableName() {
        return (new static)->getTable();
    }

			public function schools(){
				return $this->belongsTo('App\School');
			}
			
			public function students(){
				return $this->belongsTo('App\Student');
			}

			public function employees(){
				return $this->belongsTo('App\Employee');
			}

			
public function type () {
    return this->belongsTo('App\CarsType', 'carsType'); // note that the carsType is the FK attribute name
}


}