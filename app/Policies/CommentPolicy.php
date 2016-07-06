<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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
     * @param  User     $user
     * @param  Comment  $comment
     * @return bool
     */
    public function destroy(User $user, Comment $comment)
    {
        return $user->hasRole('admin');
    }
}
