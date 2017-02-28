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

    use Notifiable;

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
        'name','user','email', 'password', 'affiliation', 'active', 'created_by', 'updated_by'
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
        return $this->roles->pluck('id');
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

    public function peergroups()
    {
        return $this->hasMany('PeerGroup');  //should be 'App\PeerGroup' ?
    }
}