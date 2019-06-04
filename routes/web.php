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
    Route::get('/edit-user/{id}','UserController@edit')->name('edit-user')->where('id', '[0-9]+');
    Route::post('/edit-user/{id}','UserController@update')->where('id', '[0-9]+');
    Route::delete("/users/{id}","UserController@destroy")->name('delelete-user')->where('id', '[0-9]+');
//category
    Route::get('/add-category', "CategoryController@create")->name('add-category');
    Route::post('/add-category', "CategoryController@store");
    Route::get('/list-category', "CategoryController@index")->name('list-category');
    Route::get('/edit-category/{id}','CategoryController@edit')->name('edit-category')->where('id', '[0-9]+');
    Route::post('/edit-category/{id}', "CategoryController@update")->where('id', '[0-9]+');
    Route::delete("/delete-category/{id}","CategoryController@destroy")->name('delelete-category')->where('id', '[0-9]+');
//Tags
    Route::get('/add-tag', "TagController@create")->name('add-tag');
    Route::post('/add-tag', "TagController@store");
    Route::get('/list-tag', "TagController@index")->name('list-tag');
    Route::get('/edit-tag/{id}','TagController@edit')->name('edit-tag')->where('id', '[0-9]+');
    Route::post('/edit-tag/{id}', "TagController@update")->where('id', '[0-9]+');
    Route::delete("/delete-tag/{id}","TagController@destroy")->name('delelete-tag')->where('id', '[0-9]+');

//Post
    Route::get('/add-post', "PostController@create")->name('add-post');
    Route::post('/add-post', "PostController@store");
    Route::get('/list-post', "PostController@index")->name('list-post');
    Route::get('/edit-post/{id}', 'PostController@edit')->name('edit-post')->where('id', '[0-9]+');
    Route::post('/edit-post/{id}', "PostController@update")->where('id', '[0-9]+');
    Route::delete("/delete-post/{id}", "PostController@destroy")->name('delelete-post')->where('id', '[0-9]+'); 
});
