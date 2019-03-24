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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/posts/trash', 'PostsController@trash')->name('posts.trash');
    Route::post('/posts/restore/{post}', 'PostsController@restore')->name('posts.restore');
    Route::post('/posts/delete/{post}', 'PostsController@delete')->name('posts.delete');

    Route::resource('/posts', 'PostsController');

    Route::resource('/tags', 'TagsController');

    Route::resource('/categories', 'CategoriesController');

    Route::resource('/users', 'UsersController');
});
