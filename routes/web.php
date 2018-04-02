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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test/create', 'TestController@create');
Route::post('/test/store', 'TestController@store');

Route::get('/test/edit/{test}', 'TestController@edit');
Route::get('/test/view/{test}', 'TestController@view');
Route::get('/test/search', 'TestController@search');
Route::post('/test/update/{test}', 'TestController@update');
Route::get('/test/delete', 	[
	'uses'=>'TestController@delete',
	'as' => 'test.delete' ]);
