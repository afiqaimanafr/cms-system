<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/post/{post}', 'App\Http\Controllers\PostController@show')->name('post');

Route::middleware('auth')->group(function(){

    Route::get('/admin', 'App\Http\Controllers\AdminsController@index')->name('admin:index');
    Route::get('/admin/posts/create', 'App\Http\Controllers\PostController@create')->name('post:create');
    Route::post('/admin/posts', 'App\Http\Controllers\PostController@store')->name('post:store');
    Route::get('/admin/posts/index', 'App\Http\Controllers\PostController@index')->name('post:index');
    Route::delete('/admin/posts/delete/{post}', 'App\Http\Controllers\PostController@destroy')->name('post:destroy');
    Route::get('/admin/posts/edit/{post}', 'App\Http\Controllers\PostController@edit')->name('post:edit');
    Route::patch('/admin/posts/update/{post}', 'App\Http\Controllers\PostController@update')->name('post:update');
});
