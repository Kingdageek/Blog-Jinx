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

Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('/{slug}', 'FrontendController@singlePost')->name('frontend.single');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/posts/trash', 'PostsController@trash')->name('posts.trash');
    Route::post('/posts/restore/{post}', 'PostsController@restore')->name('posts.restore');
    Route::post('/posts/delete/{post}', 'PostsController@delete')->name('posts.delete');

    Route::resource('/posts', 'PostsController');

    Route::resource('/tags', 'TagsController');

    Route::resource('/categories', 'CategoriesController');

    Route::post('/users/admin/{user}', 'UsersController@admin')->name('users.admin');
    Route::get('/users/profile', 'ProfilesController@index')->name('users.profile.index');
    Route::patch('/users/profile/{user}', 'ProfilesController@update')->name('users.profile.update');

    Route::patch('/settings', 'SettingsController@update')->name('settings.update');
    Route::get('/settings', 'SettingsController@index')->name('settings.index');

    Route::resource('/users', 'UsersController');
});
