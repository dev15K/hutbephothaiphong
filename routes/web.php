<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ui\HomeController;
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
Route::get('/lang/{locale}', [MainController::class, 'setLanguage'])->name('language');

Route::fallback(function () {
    return view('error.404');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('auth.processLogin');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'processRegister'])->name('auth.processRegister');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::group(['prefix' => 'error'], function () {
    Route::get('/not-found', [ErrorController::class, 'notFound'])->name('error.not.found');
    Route::get('/forbidden', [ErrorController::class, 'forbidden'])->name('error.forbidden');
    Route::get('/unauthorized', [ErrorController::class, 'unauthorized'])->name('error.unauthorized');
});

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth'])->group(function () {
    require_once __DIR__ . '/webapp/auth.php';
});

Route::group(['prefix' => 'moderator', 'middleware' => ['ui.moderator']], function () {
    require_once __DIR__ . '/webapp/moderator.php';
});

Route::group(['prefix' => 'admin', 'middleware' => ['ui.admin']], function () {
    require_once __DIR__ . '/webapp/admin.php';
});

/* End web */
/* Start api */
/* Restapi api */
Route::group(['prefix' => 'api/v1/r_'], function () {
    require_once __DIR__ . '/api/restapi.php';
});
/* User api */
Route::group(['prefix' => 'api/v1/r_user', 'middleware' => ['api.user']], function () {
    require_once __DIR__ . '/api/user.php';
});
/* Moderator api */
Route::group(['prefix' => 'api/v1/r_moderator', 'middleware' => ['api.moderator']], function () {
    require_once __DIR__ . '/api/moderator.php';
});
/* Admin api */
Route::group(['prefix' => 'api/v1/r_admin', 'middleware' => ['api.admin']], function () {
    require_once __DIR__ . '/api/admin.php';
});


