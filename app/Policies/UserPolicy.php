<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     * Determine if the given user can delete the given userrecord.
     *
     * @param  User  $user
     * @param  User  $userrecord
     * @return bool
     */
    public function destroy(User $user, User $userrecord)
    {
        return $user->hasRole('admin');
    }

}
