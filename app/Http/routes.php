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
/**
 * Homepage route.
 */
Route::get('/', [
    'uses' => 'VideoController@index',
    'as' => 'homepage',
]);

/**
 * About page route.
 */
Route::get('about', [
    'uses' => 'HomeController@about',
    'as' => 'aboutpage',
]);

/**
 * Traditional Authentication routes.
 */
Route::get('auth/login', [
    'uses' => 'HomeController@login',
    'as' => 'login',
]);

Route::post('auth/login', 'Auth\AuthController@postLogin');


Route::get('auth/logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout',
]);


Route::get('auth/register', [
    'uses' => 'HomeController@register',
    'as' => 'register',
]);

Route::post('auth/register', 'Auth\AuthController@postRegister');

/**
 * Social authentication routes.
 */
Route::get('auth/{provider}', [
    'uses' => 'Auth\SocialAuthController@redirectToProvider',
    'as' => 'social.auth',
]);

Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

/**
 * Dashboard route.
 */
Route::get('dashboard', [
    'middleware' => 'auth',
    'uses' => 'HomeController@dashboard',
    'as' => 'dashboard',
]);

/**
 * Video routes.
 */
Route::get('video/myvideos', [
    'uses' => 'VideoController@getVideos',
    'as' => 'own.videos',
]);

Route::resource('video', 'VideoController');

/**
 * Category routes.
 */
Route::get('category/mycategories', [
    'uses' => 'CategoryController@getCategories',
    'as' => 'own.categories',
]);
Route::resource(
    'category',
    'CategoryController',
    ['except' => ['show', 'index', 'create']]
);

/**
 * User profile route.
 */
Route::resource(
    'profile',
    'ProfileController',
    [
    'only' => ['edit', 'update'],
    ]
);

/**
 * Changing user avatar route.
 */
Route::post('profile/{id}/photo', [
    'uses' => 'ProfileController@changeAvatar',
    'as' => 'change.avatar',
]);

/**
 * Get videos by category.
 */
Route::get('categories/{id}/videos', [
    'uses' => 'VideoController@getVideosByCategory',
    'as' => 'category.videos',
]);

/**
 * Post the number of times a video is viewed to database.
 */
Route::post('/views/video', 'VideoController@viewCount');
