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

Route::get('/','BlogController@index');

Auth::routes();


Route::group(['middleware'=>'role'],function(){
	Route::get('/dashboard', 'HomeController@index');
	Route::get('/dashboard/{name}/profile', 'BlogController@goprofile');
Route::post('/dashboard/{name}/profile', 'BlogController@goprofilepost');
});
