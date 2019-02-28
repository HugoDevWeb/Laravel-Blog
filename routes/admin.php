<?php

Route::prefix('admin')->group(function () {
    
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