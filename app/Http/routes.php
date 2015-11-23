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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', 'IndexController@index');
Route::get('contact', 'IndexController@contact');

Route::get('cv', 'CvController@index');

Route::get('home', 'HomeController@index');

Route::controllers(array(
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController'
	));

/**
 * Laravel study controllers
 */
Route::get('demo', 'DemoController@index');
