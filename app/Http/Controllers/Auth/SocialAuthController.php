<?php

namespace Soma\Http\Controllers\Auth;

use Auth;
use Socialite;
use Soma\User;
use Soma\Http\Controllers\Controller;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * Specify true as the second parameter to "Auth::login()"
     * " to set the "remember me" cookie.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('register');
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);

        return redirect()->route('dashboard');
    }

    /**
     * Return user if exists; create and return if doesn't.
     *
     * @param $socialUser
     * @return User
     */
    private function findOrCreateUser($socialUser)
    {
        if ($authUser = User::where('email', $socialUser->getEmail())->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'provider_id' => $socialUser->getAvatar(),
            'avatar' => $socialUser->getAvatar(),
        ]);
    }
}
