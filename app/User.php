<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;


class User extends Authenticatable
{
    // ToDo: This needs to checked to remove the below SoftDelete comment once the traits clash is fixed.
//    use SoftDeletes;
    use EntrustUserTrait; // Entrust Package requires this trait

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
        'User_Id',
        'email',
        'role',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get a List of roles ids associated with the current user.
     *
     * @return array
     */
    public function getRoleListAttribute()
    {
        return $this->roles->pluck('User_Id')->all();
    }

    /**
     * Returns if the user is active or not (true/false)
     *
     * @return mixed
     */
    public function isActive()
    {
        return $this->active;
    }
}
