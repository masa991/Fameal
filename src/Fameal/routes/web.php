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
    return view('homes/top');
});

Auth::routes();

Route::view('/terms', 'homes/terms');
Route::view('/privacy_policy', 'homes/privacy_policy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
