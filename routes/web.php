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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('customers', CustomerController::class);
Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
Route::post('/customer/store', 'CustomerController@store')->name('customer.store');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
Route::put('/customer/update/{id}', 'CustomerController@update')->name('customer.update');

//Route::resource('accounts', AccountController::class);
Route::get('/account/create', 'AccountController@create')->name('account.create');
Route::post('/account/store', 'AccountController@store')->name('account.store');
Route::get('/account/deposit/{id}', 'AccountController@deposit')->name('account.deposit');
Route::get('/account/withdraw/{id}', 'AccountController@withdraw')->name('account.withdraw');
Route::get('/account/transfer/{id}', 'AccountController@transfer')->name('account.transfer');
Route::put('/account/add/{id}', 'AccountController@add')->name('account.add');
Route::put('/account/draw/{id}', 'AccountController@draw')->name('account.draw');
Route::put('/account/move/{id}', 'AccountController@move')->name('account.move');
