<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description', 'created_by', 'updated_by'
    ];

    /**
     * Get a List of permission ids associated with the current role.
     *
     * @return array
     */
    public function getPermissionListAttribute()
    {
        return $this->perms->lists('id')->all();
    }

}