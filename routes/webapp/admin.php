<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\admin\AdminSettingController;

Route::group(['prefix' => 'app-settings'], function () {
    Route::get('/index', [AdminSettingController::class, 'index'])->name('admin.app.setting.index');
    Route::post('/store', [AdminSettingController::class, 'appSetting'])->name('admin.app.setting.store');
});
