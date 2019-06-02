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

//admin
Route::group(['prefix' => 'backend', 'namespace' => 'Admin'], function()
{
    Route::get('/', function() {
    	return view('admin.master');
    } );

//users
    Route::get('/add-user','UserController@create')->name('add-user');
    Route::post('/add-user','UserController@store');
    Route::get('/list-user','UserController@show')->name('list-user');
    Route::get('/edit-user/{id}','UserController@edit')->name('edit-user');
    Route::post('/edit-user/{id}','UserController@update');
    Route::delete("/users/{id}","UserController@destroy")->name('delelete-user');

});