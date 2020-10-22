<?php

namespace App\Policies;

use App\Models\{User,Post};
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function author(User $user, Post $post)
    {
        return $user->id == $post->user_id ? Response::allow() : Response::deny('Anda tidak memiliki akses');
    }
}
