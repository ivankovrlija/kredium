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

Route::post('/login', 'App\Http\Controllers\UserController@login');
Route::post('/logout', 'App\Http\Controllers\UserController@logout');

Route::resource('clients', 'App\Http\Controllers\ClientController')->middleware('auth');

Route::post('/cash-loan', 'App\Http\Controllers\CashLoanProductController@store');
Route::post('/home-loan', 'App\Http\Controllers\HomeLoanProductController@store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/reports', 'App\Http\Controllers\ReportController@generateReport')->middleware('auth');