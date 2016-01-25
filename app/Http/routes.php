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
Route::get('/welcome', 'WelcomeController@index');
Route::get('/hello/{name}', 'WelcomeController@hello');

Route::get('index', 'IndexController@index');
Route::get('contact', 'IndexController@contact');

Route::get('cv', 'CvController@index');

Route::get('home', function () {
    return view('welcome');
});

Route::controllers(array(
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
));

// resource route for RESTFull
Route::resource('photo', 'PhotoController');

// articles routes

Route::group(['as' => 'article::', 'prefix' => 'articles'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'ArticlesController@index']);
    Route::get('/list', ['as' => 'list', 'uses' => 'ArticlesController@index']);
    Route::get('/create', ['as' => 'create', 'uses' => 'ArticlesController@create']);
    Route::post('/store', ['as' => 'store', 'uses' => 'ArticlesController@store']);
    Route::get('/{article}', ['as' => 'show', 'uses' => 'ArticlesController@show']);
    Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'ArticlesController@edit']);
    Route::patch('/{id}', ['as' => 'update', 'uses' => 'ArticlesController@update']);
    Route::put('/{id}', ['as' => 'update_', 'uses' => 'ArticlesController@update']);
    Route::get('/view/{id}', ['as' => 'view', 'uses' => 'ArticlesController@view']);
});

//Route::get('articles', 'ArticlesController@index')->name('article_home');
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/create', ['as' => 'article_add',
//							   'uses' => 'ArticlesController@create']);
//Route::get('articles/{article}', ['as' => 'article_view',
//								  'uses' => 'ArticlesController@show']);

// demo routes
Route::get('/demo/{id}', ['as' => 'demo', 'uses' => 'DemoController@index']);
Route::match(['get', 'post'], 'demos', ['as'   => 'demos',
                                        'uses' => 'DemoController@index']);
Route::any('/demo', 'DemoController@index');