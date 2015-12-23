<?php

namespace Soma\Policies;

use Soma\User;
use Soma\Videos;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoAuthorizePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given video can be changed or deleted by the user.
     *
     * @param  \Soma\User  $user
     * @param  \Soma\Videos  $video
     * @return bool
     */
    public function userVideo(User $user, Videos $video)
    {
        return $user->id === $video->user_id;
    }
}
