<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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

Route::get('/', [HomeController::class, 'home']);
Route::get('dashboard', function () {
  return view('dashboard');
})->name('dashboard');

Route::get('billing', function () {
  return view('billing');
})->name('billing');

Route::get('profile', function () {
  return view('profile');
})->name('profile');

Route::get('rtl', function () {
  return view('rtl');
})->name('rtl');

Route::get('user-management', function () {
  return view('laravel-examples/user-management');
})->name('user-management');

Route::get('tables', function () {
  return view('tables');
})->name('tables');

Route::get('virtual-reality', function () {
  return view('virtual-reality');
})->name('virtual-reality');

Route::get('static-sign-in', function () {
  return view('static-sign-in');
})->name('sign-in');

Route::get('static-sign-up', function () {
  return view('static-sign-up');
})->name('sign-up');
