<?php

namespace App\Policies;

use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can delete the given role.
     *
     * @param  User  $user
     * @param  Role  $role
     * @return bool
     */
    public function destroy(User $user, Role $role)
    {
        return $user->hasRole('admin');
    }
}
