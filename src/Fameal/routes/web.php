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

Route::view('/', 'homes/top');
Route::view('terms', 'homes/terms');
Route::view('privacy_policy', 'homes/privacy_policy');

Auth::routes(['verify' => true]);
Route::prefix('register')->group(function () {
  Route::get('invited/{token}', [App\Http\Controllers\Auth\RegisterController::class, 'showInvitedUserRegistrationForm'])->name('invited.{token}');
  Route::post('invited', [App\Http\Controllers\Auth\RegisterController::class, 'registerInvitedUser'])->name('invited');
});

Route::get('invite', 'App\Http\Controllers\InviteController@showLinkRequestForm')->name('invite')->middleware('auth');
Route::post('invite', 'App\Http\Controllers\InviteController@sendInviteFamilyEmail')->name('invite.email')->middleware('auth');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
