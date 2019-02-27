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


use App\Http\Middleware\Admin;

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


Route::prefix('admin')->middleware(Admin::class)->group(function () {

    Route::get('', 'AdminController@index')->name('admin.index');

    Route::prefix('post-index')->group(function () {

        Route::get('/', 'AdminController@postIndex')->name('admin.post_index');

        Route::get('/create', 'AdminController@adminFormPost')->name('admin.post_form');

        Route::post('/create', 'AdminController@adminStoreFormPost')->name('admin.post_form');

    });

    Route::prefix('post')->group(function () {

        Route::get('/detail/{id}', 'AdminController@postDetail')->name('admin.post_detail');

        Route::post('/detail/{id}', 'AdminController@storeComment')->name('admin.post_detail');

        Route::get('/detail/{idPost}/comment/{idComm}/validate', 'AdminController@validateComment')->name('admin.post_detail');

        Route::get('/edit/{id}', 'AdminController@postEdit')->name('admin.post_edit');

        Route::post('/edit/{id}', 'AdminController@postUpdate')->name('admin.post_update');

        Route::get('/delete/{id}', 'AdminController@destroy')->name('admin.destroy');

    });

});







