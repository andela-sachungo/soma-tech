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
        return view('dashboard.index');
    }
}
