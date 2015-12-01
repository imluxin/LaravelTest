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


// demo routes
Route::get('demo', 'DemoController@index');

// articles routes
Route::get('articles', 'ArticlesController@index')->name('article_home');
Route::post('articles', 'ArticlesController@store');
Route::get('articles/create', ['as' => 'article_add', 'uses' => 'ArticlesController@create']);
Route::get('articles/{id}', 'ArticlesController@show');