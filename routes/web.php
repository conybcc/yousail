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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/update/avatar', 'UserController@avatarUpdateShow')->name('avatar.update.show');
    Route::post('/update/avatar', 'UserController@avatarUpdateSubmit');

    Route::get('/article/save/{id?}', 'ArticleController@saveShow')->name('article.save.show');
    Route::post('/article/save/{id?}', 'ArticleController@saveSubmit');
    Route::get('/article/detail/{id}', 'ArticleController@detail')->name('article.detail');
    Route::get('/article/delete/{id}', 'ArticleController@delete')->name('article.delete');

    Route::post('/comment/create', 'CommentController@create')->name('comment.create');
});
