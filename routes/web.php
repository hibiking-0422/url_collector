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

//authルーティング全般
Auth::routes();

//ホームルーティング
Route::get('/home', 'HomeController@index')->name('home');

//urlルーティング
Route::get('/url', 'UrlController@index')
    ->middleware('auth');
Route::get('/url/add', 'UrlController@add')
    ->middleware('auth');
Route::post('/url/add', 'UrlController@create')
    ->middleware('auth');
Route::get('/url/edit', 'UrlController@edit')
    ->middleware('auth');
Route::post('/url/edit', 'UrlController@update')
    ->middleware('auth');
Route::get('/url/del', 'UrlController@delete')
    ->middleware('auth');
Route::post('/url/del', 'UrlController@remove')
    ->middleware('auth');

//genreルーティング
Route::get('/genre', 'GenreController@index')
    ->middleware('auth');
Route::get('/genre/add', 'GenreController@add')
    ->middleware('auth');
Route::post('/genre/add', 'GenreController@create')
    ->middleware('auth');
Route::get('/genre/edit', 'GenreController@edit')
    ->middleware('auth');
Route::post('/genre/edit', 'GenreController@update')
    ->middleware('auth');
Route::get('/genre/del', 'GenreController@delete')
    ->middleware('auth');
Route::post('/genre/del', 'GenreController@remove')
    ->middleware('auth');

//test
Route::get('genre/json', 'GenreController@json');
Route::get('genre/json/{id}', 'GenreController@json');
Route::get('url/getUrls', 'UrlController@getUrls');
Route::get('genre/searchGenres', 'GenreController@searchGenres');
Route::get('url/getAllUrls', 'UrlController@getAllUrls');
