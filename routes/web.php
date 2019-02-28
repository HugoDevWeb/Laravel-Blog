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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::prefix('post')->group(function (){
    Route::get('/', 'PostController@index')->name('post.index');

    Route::get('/create', 'PostController@getFormPost')->name('post.create');

    Route::post('/create', 'PostController@storeFormPost')->name('post.create');

    Route::get('/detail/{id}', 'PostController@detail')->name('post.detail');

    Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');

    Route::post('/edit/{id}', 'PostController@update')->name('post.update');

    Route::get('/delete/{id}', 'PostController@destroy')->name('post.delete');

    Route::get('/detail/{id}/comment', 'CommentController@createComment')->name('comment.create');

    Route::post('/detail/{id}/comment', 'CommentController@storeComment')->name('comment.create');
});







