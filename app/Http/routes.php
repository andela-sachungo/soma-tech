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

// homepage route
Route::get('/', [
    'uses' => 'VideoController@index',
    'as' => 'homepage',
]);

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
    'as' => 'social.auth',
]);

Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

// Dashboard route
Route::get('dashboard', [
    'middleware' => 'auth',
    'uses' => 'HomeController@dashboard',
    'as' => 'dashboard',
]);

// Video route
Route::get('video/myvideos', [
    'uses' =>'VideoController@getVideos',
    'as' => 'own.videos',
]);

Route::resource('video', 'VideoController');

//Category route
Route::get('category/mycategories', [
    'uses' =>'CategoryController@getCategories',
    'as' => 'own.categories',
]);
Route::resource(
    'category',
    'CategoryController',
    ['except' => ['show']]
);

// Profile route
Route::resource(
    'profile',
    'ProfileController',
    [
    'only' => ['edit', 'update'],
    ]
);

// change avatar
Route::post('profile/{id}/photo', [
    'uses' => 'ProfileController@changeAvatar',
    'as' => 'change.avatar',
]);

// Get videos by category
Route::get('categories/{id}/videos', [
    'uses' => 'VideoController@getVideosByCategory',
    'as'=>'category.videos',
]);
