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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/items/create', 'App\Http\Controllers\ItemController@create')->name('item.create');
Route::post('/items/save', 'App\Http\Controllers\ItemController@save')->name('item.save');
Route::delete('/items/delete/{id}', 'App\Http\Controllers\ItemController@delete')->name('item.delete');
Route::get('/items', 'App\Http\Controllers\ItemController@index')->name('item.index');
Route::get('/items/{id}', 'App\Http\Controllers\ItemController@show')->name('item.show');