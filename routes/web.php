<?php

/*
|--------------------------------------------------------------------------
| Blog - Content Management System
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::group(['namespace' => 'Site', 'middleware' => 'web'], function () {
    // Welcome Page
    Route::get('/', 'SiteWelcomeController@index')->name('site.welcome');

    // Blog
    Route::get('posts', 'SitePostsController@index')->name('site.posts.index');
    Route::get('posts/{post}', 'SitePostsController@show')->name('site.posts.show');
    Route::get('categories/{category}', 'SitePostsController@category')->name('site.posts.category');
    Route::get('tags/{tag}', 'SitePostsController@tag')->name('site.posts.tag');

    // Shop
    Route::resource('products', 'SiteProductController',['as' => 'site']);
    Route::resource('shops', 'SiteShopController',['as' => 'site']);
});

Route::group(['namespace' => 'Admin', 'prefix'=>'admin', 'middleware' => ['auth']], function () {
    // Blog
    Route::get('/', 'AdminDashboardController@index')->name('dashboard.index');
    Route::resource('categories', 'AdminCategoryController');
    Route::resource('posts', 'AdminPostController');
    Route::get('trashed-posts', 'AdminPostController@trashed')->name('trashed-posts.index');
    Route::put('restore-post/{post}', 'AdminPostController@restore')->name('restore-posts');
    Route::resource('tags', 'AdminTagController');

    // Shop
    Route::resource('products', 'AdminProductController');

    // Features
    Route::resource('slides', 'AdminSlideController');
    Route::get('corona-virus', 'AdminScraperController@coronaVirus')->name('corona-virus');
    Route::resource('links', 'AdminLinkController');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // User Management
    Route::get('users', 'Admin\AdminUserController@index')->name('users.index');
    Route::get('users/profile', 'Admin\AdminUserController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'Admin\AdminUserController@update')->name('users.update-profile');
    Route::post('users/{user}/make-admin', 'Admin\AdminUserController@makeAdmin')->name('users.make-admin');
});
