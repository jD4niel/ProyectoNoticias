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



Route::get('/index','PostController@index')->name('index.post');
Route::post('/delete','PostController@destroy')->name('delete.post');
Route::post('/update','PostController@update')->name('update.post');
Route::get('/create','PostController@crear')->name('create.post');
Route::post('/create','PostController@create')->name('create.new.post');
Route::post('/upImg','PostController@upload')->name('imagenes.up');
