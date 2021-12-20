<?php

/*
|--------------------------------------------------------------------------
| Blog - Content Management System
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::group(['namespace' => 'Site', 'middleware' => 'web'], function () {
    Route::get('/', 'SiteHomeController@index')->name('site.home');
    Route::get('posts/{post}', 'SitePostsController@show')->name('site.posts.show');
    Route::get('categories/{category}', 'SitePostsController@category')->name('site.posts.category');
    Route::get('tags/{tag}', 'SitePostsController@tag')->name('site.posts.tag');
});

Route::group(['namespace' => 'Admin', 'prefix'=>'admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'AdminDashboardController@index')->name('dashboard.index');
    Route::resource('categories', 'AdminCategoryController');
    Route::resource('slides', 'AdminSlideController');
    Route::resource('posts', 'AdminPostController');
    Route::get('trashed-posts', 'AdminPostController@trashed')->name('trashed-posts.index');
    Route::put('restore-post/{post}', 'AdminPostController@restore')->name('restore-posts');
    Route::resource('tags', 'AdminTagController');

    // Scraper
    Route::get('scraper', 'AdminScraperController@index')->name('scraper.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users', 'Admin\AdminUserController@index')->name('users.index');
    Route::get('users/profile', 'Admin\AdminUserController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'Admin\AdminUserController@update')->name('users.update-profile');
    Route::post('users/{user}/make-admin', 'Admin\AdminUserController@makeAdmin')->name('users.make-admin');
});
