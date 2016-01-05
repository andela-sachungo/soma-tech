<?php

namespace Soma\Http\Controllers;

use Auth;

class HomeController extends Controller
{
    /**
     * Return the login view.
     *
     * @return view
     */
    public function login()
    {
        // If the user is logged in when they access the login page,
        // they are logged out.
        /*if (auth()->user()) {
            Auth::logout();
        }*/
        if (auth()->user()) {
            return view('dashboard.index');
        }

        return view('auth.login');
    }

    /**
     * Return the register view.
     *
     * @return view
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Return the dashboard view.
     *
     * @return view
     */
    public function dashboard()
    {
        //dd(Auth::user());
        return view('dashboard.index');
    }
}
