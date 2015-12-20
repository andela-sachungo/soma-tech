<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@homepage');

// Authentication routes...
Route::get('auth/login', [
    'uses' => 'HomeController@login',
    'as' => 'login',
]);
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Logout route
Route::get('auth/logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout',
]);

// Registration routes...
Route::get('auth/register', [
    'uses' => 'HomeController@register',
    'as' => 'register',
]);
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Social authentication routes
Route::get('auth/{provider}', [
    'uses' => 'Auth\SocialAuthController@redirectToProvider',
    'as' => 'social.auth'
]);
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

// Dashboard route
Route::get('dashboard', [
    'middleware' => 'auth',
    'uses' => 'HomeController@dashboard',
    'as' => 'dashboard',
]);
