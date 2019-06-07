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

//Login&Logout
Route::get('/login', 'LoginController@getLogin')->name('userLogin');
Route::post('/login', 'LoginController@postLogin');
//register
Route::get('/register', 'LoginController@create')->name('userRegister');
Route::post('/register', 'LoginController@store');
//Display blog
Route::get('/', 'BlogController@index')->name('userHome');
Route::get('/post/{id}', 'BlogController@show')->name('blogDetail');
Route::get('/home', 'BlogController@index')->name('home');
Route::get('/category/{id}', 'BlogController@getByCategory')->name('category');
Route::get('/tag/{id}', 'BlogController@getByTag')->name('tag');
//comment
Route::post('postComment/{id}', 'CommentController@guestComment');
Route::delete('delete-comment/{id}', 'CommentController@destroy');
Route::post('show-comment/{id}', 'CommentController@showComment');

Route::group([ "middleware"=>"login"], function(){
//CRUD post
    Route::get('/list-post', 'BlogController@getByUser')->name('listPost');
    Route::get('/add-post', 'BlogController@create')->name('addPost');
    Route::post('/add-post', 'BlogController@store')->name('Post');
    Route::get('edit-post/{id}', 'BlogController@edit')->name('editPost');
    Route::post('update-post/{id}', 'BlogController@update');
//Update profile
    Route::get('/profile/{id}', 'ProfileController@show')->name('userProfile');
    Route::get('/edit-profile/{id}', 'ProfileController@edit')->name('userEditProfile');
    Route::post('/edit-profile/{id}', 'ProfileController@update');
//Logout
    Route::get('/logout', 'LoginController@Logout')->name('userLogout');
});


