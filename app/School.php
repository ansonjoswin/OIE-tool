<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;
use App\PartTimeStudent;

/**
 * Class User
 * @package App
 */
class School extends Model
{
    protected $fillable = [
        'unit_id', 'school_name', 'school_city', 'school_state', 'longitude', 'latitude', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
    protected $primaryKey = 'school_id';
    public static function getTableName() {
        return (new static)->getTable();
    }

    public function Student()
    {
        return $this->hasMany('App\Student');
    }

    public function revenue()
    {
        return $this->hasMany('App\Revenue');
    }

    public function expense()
    {
        return $this->hasMany('App\Expense');
    }
}