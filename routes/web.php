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
    $products = App\product::all();
    return view('welcome', compact('products'));
})->name("welcome");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/product', 'ProductController');

Route::post('/basket', 'BasketController@store')->name("order.store");
Route::get('/basket/{user}', 'BasketController@show')->name("order.show");
