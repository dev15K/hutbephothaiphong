<?php

use App\Http\Controllers\restapi\AuthApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Restapi Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthApi::class, 'login'])->name('restapi.auth.login');
    Route::post('/register', [AuthApi::class, 'register'])->name('restapi.auth.register');
    Route::post('/logout', [AuthApi::class, 'logout'])->name('restapi.auth.logout');
});
