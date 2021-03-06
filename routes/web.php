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

Route::resources([
   'categories' => 'CategoryController',
   'posts'      => 'PostController',
]);

Route::post('comment', 'CommentController@store')
    ->name('comment.store');

Route::get('/posts/{post}/download', 'PostController@downloadFile')
    ->name('post.file.download');

Route::get('/statistics', 'StatisticController@visits')
    ->name('statistics');
