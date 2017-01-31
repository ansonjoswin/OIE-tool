<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class School extends Model
{
    protected $fillable = [
        'unit_id', 'school_name', 'school_city', 'school_state', 'longitude', 'latitude', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
    protected $primaryKey = 'school_id';
    public static function getTableName() {
        return (new static)->getTable();
    }
}
