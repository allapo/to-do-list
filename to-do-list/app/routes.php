<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::bind('task', function($value, $route) {
	return Item::where('id', $value)->first();
});


Route::get('/', array('as' => 'home',  'uses' => 'HomeController@getIndex'))->before('auth');
Route::post('item', array('uses' => 'HomeController@postIndex'))->before('csrf');

Route::get('/new', array('as' => 'new', 'uses' => 'HomeController@getNew'));
Route::post('/new', array('uses' => 'HomeController@postNew'))->before('csrf');

Route::get('/up/{task}', array('as' => 'up', 'uses' => 'HomeController@getUpdate'));
Route::post('/up', array('uses' => 'HomeController@postUpdate'))->before('csrf');

Route::get('/delete/{task}', array('as' => 'delete', 'uses' => 'HomeController@getDelete'));

Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getlogin'))->before('guest');
Route::post('login', array('uses' => 'AuthController@postlogin'))->before('csrf');
