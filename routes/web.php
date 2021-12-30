<?php

/*
|--------------------------------------------------------------------------
| Blog - Content Management System
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::group(['namespace' => 'Admin', 'prefix'=>'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    Route::group(['namespace' => 'Blog'], function () {
        Route::resource('categories', 'CategoryController');
        Route::resource('tags', 'TagController');
        Route::resource('posts', 'PostController');
        Route::get('trashed-posts', 'PostController@trashed')->name('trashed-posts.index');
        Route::put('restore-post/{post}', 'PostController@restore')->name('restore-posts');
        Route::resource('slides', 'SlideController');
    });

    Route::group(['namespace' => 'Shop'], function () {
        Route::resource('products', 'ProductController');
    });

    Route::group(['namespace' => 'Link'], function () {
        Route::resource('links', 'LinkController');
    });

    Route::group(['namespace' => 'Scrap'], function () {
        Route::get('corona-virus', 'ScraperController@coronaVirus')->name('corona-virus');
    });

    Route::group(['namespace' => 'User', 'middleware' => ['admin']], function () {
        Route::get('users', 'UserController@index')->name('users.index');
        Route::get('users/profile', 'UserController@edit')->name('users.edit-profile');
        Route::put('users/profile', 'UserController@update')->name('users.update-profile');
        Route::post('users/{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');
    });

});


Route::group(['namespace' => 'Site', 'as' => 'site.', 'middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['namespace' => 'Blog', 'prefix'=>'blog'], function () {
        Route::get('posts', 'PostController@index')->name('posts.index');
        Route::get('posts/{post}', 'PostController@show')->name('posts.show');
        Route::get('categories/{category}', 'PostController@category')->name('posts.category');
        Route::get('tags/{tag}', 'PostController@tag')->name('posts.tag');
    });

    Route::group(['namespace' => 'Shop', 'prefix'=>'shop'], function () {
        Route::resource('products', 'ProductController');
        Route::get('add-to-cart/{id}', 'ProductController@addToCart')->name('products.addToCart');
        Route::get('shopping-cart', 'ProductController@shoppingCart')->name('products.shoppingCart');
        Route::get('checkout', 'ProductController@checkout')->name('products.checkout');
        Route::post('checkout', 'ProductController@postCheckout')->name('products.checkout');
    });

});
