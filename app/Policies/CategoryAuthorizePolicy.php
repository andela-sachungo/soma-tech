<?php

namespace Soma\Policies;

use Soma\User;
use Soma\Categories;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryAuthorizePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given category can be changed or deleted by the user.
     *
     * @param  \Soma\User  $user
     * @param  \Soma\Categories  $category
     * @return bool
     */
    public function userCategory(User $user, Categories $category)
    {
        return $user->id === $category->user_id;
    }
}
