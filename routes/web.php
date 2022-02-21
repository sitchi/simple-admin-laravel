<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
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

Route::view('/', 'auth.login')->middleware('guest');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('users', UsersController::class);
});
