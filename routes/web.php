<?php

use Illuminate\Support\Facades\Route;

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
// Route::view('create', 'articles.create');
// Route::view('show', 'articles.show');
Route::post('/comments', 'CommentController@store');

Route::middleware('auth')->group(function () {
    Route::get('articles', 'ArticleController@index')->name('articles.index');
    Route::get('articles/create', 'ArticleController@create')->name('articles.create');
    Route::post('articles', 'ArticleController@store')->name('articles.store');
    Route::get('articles/{article}', 'ArticleController@show')->name('articles.show');
    Route::patch('articles/{article}', 'ArticleController@update')->name('articles.update');
});
