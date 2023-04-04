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

Route::prefix('admin')->group(function() {
    Route::resource('setting', 'BaseController');
    Route::resource('comment', 'CommentController');
    Route::get('comment-status/{id}', 'CommentController@status')->name('comment-status');
});
