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
Route::get('/items', 'App\Http\Controllers\User\UserItemController@index')->name('user.item.index');
Route::get('/language', 'App\Http\Controllers\LangController@locale')->name('lang.locale');
/*
|--------------------------------------------------------------------------
| Here you will found all the routes related to admin role. This middleware
| would accept incoming traffic from users with an admin role. Otherwise,
| is going to be rejected due an unauthorized request.
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.index');

    Route::get('/admin/items/create', 'App\Http\Controllers\Admin\AdminItemController@create')->name('admin.item.create');
    Route::post('/admin/items/save', 'App\Http\Controllers\Admin\AdminItemController@save')->name('admin.item.save');
    Route::delete('/admin/items/delete/{id}', 'App\Http\Controllers\Admin\AdminItemController@delete')->name('admin.item.delete');
    Route::get('/admin/items', 'App\Http\Controllers\Admin\AdminItemController@index')->name('admin.item.index');
    Route::get('/admin/items/{id}', 'App\Http\Controllers\Admin\AdminItemController@show')->name('admin.item.show');
    Route::put('/admin/items/{id}', 'App\Http\Controllers\Admin\AdminItemController@update')->name('admin.item.update');

    Route::get('/admin/reviews', 'App\Http\Controllers\Admin\AdminReviewController@index')->name('admin.review.index');
    Route::get('/admin/reviews/{id}', 'App\Http\Controllers\Admin\AdminReviewController@show')->name('admin.review.show');
    Route::delete('/admin/reviews/{id}', 'App\Http\Controllers\Admin\AdminReviewController@delete')->name('admin.review.delete');

    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');
    Route::delete('/admin/users/{id}', 'App\Http\Controllers\Admin\AdminUserController@delete')->name('admin.user.delete');
});

Route::middleware(['auth', 'user'])->group(function () {
    //user
    Route::get('/myProfile', 'App\Http\Controllers\User\UserController@profile')->name('user.profile');

    Route::get('/my-purchases', 'App\Http\Controllers\User\UserMyPurchasesController@index')->name('user.purchase.index');

    Route::get('/character', 'App\Http\Controllers\User\UserCharacterController@editView')->name('character.editView');
    Route::put('/character/update', 'App\Http\Controllers\User\UserCharacterController@update')->name('character.update');

    Route::get('/items/{id}', 'App\Http\Controllers\User\UserItemController@show')->name('user.item.show');
    Route::post('/items/{itemId}/review', 'App\Http\Controllers\User\UserItemController@addReview')->name('user.item.review');

    Route::get('/cart', 'App\Http\Controllers\User\UserCartController@index')->name('user.cart.index');
    Route::get('/cart/delete', 'App\Http\Controllers\User\UserCartController@delete')->name('user.cart.delete');
    Route::post('/cart/add/{id}', 'App\Http\Controllers\User\UserCartController@add')->name('user.cart.add');
    Route::get('/cart/purchase', 'App\Http\Controllers\User\UserCartController@purchase')->name('user.cart.purchase');
});

Auth::routes();
