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

Route::get('/', ['as' => 'home', function () {
    return view('welcome');
}]);

Route::get('index', 'IndexController@index');
Route::get('contact', 'IndexController@contact');

Route::get('cv', 'CvController@index');

Route::get('home', function(){
	return view('welcome');
});

Route::controllers(array(
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController'
	));

// resource route for RESTFull
Route::resource('photo', 'PhotoController');

// articles routes

Route::group(['as' => 'article::', 'prefix' => 'articles'], function(){
	Route::get('/list', ['as' => 'list', 'uses' => 'ArticlesController@index']);
	Route::get('/create', ['as' => 'create', 'uses' => 'ArticlesController@create']);
	Route::post('/store', ['as' => 'store', 'uses' => 'ArticlesController@store']);
	Route::get('/{article}', ['as' => 'show', 'uses' => 'ArticlesController@show']);
});

//Route::get('articles', 'ArticlesController@index')->name('article_home');
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/create', ['as' => 'article_add',
//							   'uses' => 'ArticlesController@create']);
//Route::get('articles/{article}', ['as' => 'article_view',
//								  'uses' => 'ArticlesController@show']);

// demo routes
Route::get('demo/{id}', ['as' => 'demo', 'uses' =>'DemoController@index']);
Route::match(['get', 'post'], 'demos', ['as' => 'demos',
										'uses' => 'DemoController@index']);
Route::any('demo_all', 'DemoController@index');