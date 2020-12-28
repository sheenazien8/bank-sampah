<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BotTelegramController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TodayPicController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
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

Route::group(['prefix' => '/'], function () {
    App::setLocale(setting('bahasa') ?? 'id');
    Route::get('/table', function () {
        return view('app.table');
    });

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('/nasabah', NasabahController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/item', ItemController::class);
        Route::resource('/pic', PicController::class);
        Route::resource('/saving', SavingController::class);
        Route::post('/tarik_tunai/saving/', [SavingController::class, 'tarikTunai'])->name('saving.tarik_tunai');
        Route::get('/report', [ReportController::class, 'index'])->name('report.index');
        Route::post('/report', [ReportController::class, 'generate'])->name('report.generate');
        Route::resource('/today-pic', TodayPicController::class);
        Route::resource('/transaction', TransactionController::class);
        Route::resource('/unit', UnitController::class);
        Route::resource('/setting', SettingController::class)->only(['index', 'store']);
        Route::resource('/activity', ActivityController::class);
        Route::resource('/content', ContentController::class);
    });


    Route::match(['get', 'post'], '/botman', [BotTelegramController::class, 'handle']);
});

Route::get('/so/index', function () {
    return view('so.index');
})->name('so.index');

Route::group(['prefix' => 'artisan'], function () {
    Route::get('migrate/{command}', function ($command) {
        Artisan::call("migrate:$command");
    });
    Route::get('make/{command}', function ($command) {
        Artisan::call("make:$command");
    });
    Route::get('{command}', function ($command) {
        Artisan::call("$command");
    });
});
