<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TodayPicController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnitController;
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

Route::get('/table', function () {
    return view('app.table');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/nasabah', NasabahController::class);
    Route::resource('/item', ItemController::class);
    Route::resource('/pic', PicController::class);
    Route::resource('/saving', SavingController::class);
    Route::resource('/today-pic', TodayPicController::class);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/unit', UnitController::class);
    Route::resource('/setting', SettingController::class);
});

