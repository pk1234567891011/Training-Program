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
Route::delete('posts', 'PostController@deleteAll');
Route::resource('posts','PostController');
Route::resource('product','ProductController');
Route::delete('product', 'ProductController@deleteAll');
Route::get('/postsearch','PostController@search');
Route::get('/productsearch','ProductController@search');