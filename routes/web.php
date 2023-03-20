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
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');

Route::get('/admin/items/create', 'App\Http\Controllers\ItemController@create')->name('admin.item.create');
Route::post('/admin/items/save', 'App\Http\Controllers\ItemController@save')->name('admin.item.save');
Route::delete('/admin/items/delete/{id}', 'App\Http\Controllers\ItemController@delete')->name('admin.item.delete');
Route::get('/admin/items', 'App\Http\Controllers\ItemController@index')->name('admin.item.index');
Route::get('/admin/items/{id}', 'App\Http\Controllers\ItemController@show')->name('admin.item.show');

Route::get('/admin/reviews', 'App\Http\Controllers\ReviewController@index')->name('admin.review.index');
Route::get('/admin/reviews/{id}', 'App\Http\Controllers\ReviewController@show')->name('admin.review.show');
Route::delete('/admin/reviews/{id}', 'App\Http\Controllers\ReviewController@delete')->name('admin.review.delete');

Auth::routes();
