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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoryController');
Route::resource('posts', 'PostController');
Route::get('trashed-posts', 'PostController@trashed')->name('trashed-posts.index');
Route::put('restore-post/{post}', 'PostController@restore')->name('restore-posts');
Route::resource('slides', 'SlideController');
