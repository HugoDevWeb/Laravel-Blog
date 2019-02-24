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

Route::get('/post', 'PostController@index')->name('post.index');

Route::get('/post/create', 'PostController@getFormPost')->name('post.create');

Route::post('/post/create', 'PostController@storeFormPost')->name('post.create');

Route::get('/post/detail/{id}', 'PostController@detail')->name('post.detail');

Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');

Route::post('/post/edit/{id}', 'PostController@update')->name('post.update');

Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');




Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/admin/post-index', 'AdminController@postIndex')->name('admin.post_index');

Route::get('/admin/post-index/create', 'AdminController@adminFormPost')->name('admin.post_form');

Route::post('/admin/post-index/create', 'AdminController@adminStoreFormPost')->name('admin.post_form');

Route::get('/admin/post/detail/{id}', 'AdminController@postDetail')->name('admin.post_detail');

Route::post('/admin/post/detail/{id}', 'AdminController@storeComment')->name('admin.post_detail');

Route::get('/admin/post/detail/{idPost}/comment/{idComm}/validate', 'AdminController@validateComment')->name('admin.post_detail');

Route::get('/admin/post/edit/{id}', 'AdminController@postEdit')->name('admin.post_edit');

Route::post('/admin/post/edit/{id}', 'AdminController@postUpdate')->name('admin.post_update');

Route::get('/admin/post/delete/{id}', 'AdminController@destroy')->name('admin.destroy');






Route::get('/post/detail/{id}/comment', 'CommentController@createComment')->name('comment.create');

Route::post('/post/detail/{id}/comment', 'CommentController@storeComment')->name('comment.create');