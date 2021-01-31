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

Route::get('/', 'FoodApp\HomeController@index')->name('home');

Route::get('/menu', 'FoodApp\MenuController@index')->name('menu');

Route::get('/food-cart', 'FoodApp\HomeController@listCart')->name('foodcart');

Route::get('/addToCart/{id}', 'FoodApp\MenuController@addToCart')->name('addToCart');

Route::get('/reduce/{id}', 'FoodApp\MenuController@cartReduceByOne')->name('reduceByOne');

Route::get('/remove/{id}', 'FoodApp\MenuController@removeFromCart')->name('removeFromCart');

Route::get('/get_checkout', 'FoodApp\MenuController@checkout')->name('getCheckout')->middleware('authuser');

Route::post('/post_checkout', 'FoodApp\MenuController@charge')->name('postCheckout')->middleware('authuser');

/**
 * For User or Customer
 */
Route::middleware(['auth:sanctum', 'verified', 'authuser'])->group(function() {
    Route::get('/user/dashboard', 'User\MainController@index')->name('user_dashboard');
});

/**
 * For Admin
 */
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function() {
    Route::get('/admin/dashboard', 'Admin\MainController@index')->name('admin_dashboard')->middleware('authadmin');

    Route::get('/admin/users', 'Admin\DashboardController@listusers')->middleware('authadmin');

    Route::get('/user-edit/{id}', 'Admin\DashboardController@useredit')->middleware('authadmin');

    Route::put('/user-register-update/{id}', 'Admin\DashboardController@userupdate')->middleware('authadmin');

    Route::delete('/user-delete/{id}', 'Admin\DashboardController@userdelete')->middleware('authadmin');

    Route::get('/admin/menus','Admin\MenuController@index')->middleware('authadmin');

    Route::post('/save-menu', 'Admin\MenuController@store')->middleware('authadmin');

    Route::get('/menus/{id}', 'Admin\MenuController@edit')->middleware('authadmin');

    Route::put('/admin/menus-update/{id}', 'Admin\MenuController@update')->middleware('authadmin');

    Route::delete('/admin/menus-delete/{id}', 'Admin\MenuController@delete')->middleware('authadmin');

    Route::get('/orders', 'Admin\DashboardController@getOrders')->middleware('authadmin');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

