<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//TODO Rename to add 'admin' prefix to path
Route::get('/items/create', 'App\Http\Controllers\ItemController@create')->name('item.create');
Route::post('/items/save', 'App\Http\Controllers\ItemController@save')->name('item.save');
Route::delete('/items/delete/{id}', 'App\Http\Controllers\ItemController@delete')->name('item.delete');
Route::get('/items', 'App\Http\Controllers\ItemController@index')->name('item.index');
Route::get('/items/{id}', 'App\Http\Controllers\ItemController@show')->name('item.show');

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
Route::get('/admin/reviews', 'App\Http\Controllers\ReviewController@index')->name('admin.review.index');
Route::get('/admin/reviews/create', 'App\Http\Controllers\ReviewController@create')->name('admin.review.create');
Route::post('/admin/reviews/save', 'App\Http\Controllers\ReviewController@save')->name('admin.review.save');
Route::get('/admin/reviews/{id}', 'App\Http\Controllers\ReviewController@show')->name('admin.review.show');
Route::delete('/admin/reviews/{id}', 'App\Http\Controllers\ReviewController@delete')->name('admin.review.delete');
