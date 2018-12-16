<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
	Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
	Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
    Route::post('profile/edit', 'Admin\ProfileController@update')->middleware('auth');
	Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update'); // 追記
	Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');

	Route::get('att/create', 'Admin\AttController@add')->middleware('auth');
	Route::get('att/bstest', 'Admin\AttController@bstest');
	Route::post('att/create', 'Admin\AttController@create')->middleware('auth');

	Route::get('att', 'Admin\AttController@index')->middleware('auth');
	Route::get('att/delete', 'Admin\AttController@delete')->middleware('auth');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
