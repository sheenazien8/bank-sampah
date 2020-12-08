<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TodayPicController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
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
    Route::resource('/user', UserController::class);
    Route::resource('/item', ItemController::class);
    Route::resource('/pic', PicController::class);
    Route::resource('/saving', SavingController::class);
    Route::post('/tarik_tunai/saving/', [SavingController::class, 'tarikTunai'])->name('saving.tarik_tunai');
    Route::resource('/today-pic', TodayPicController::class);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/unit', UnitController::class);
    Route::resource('/setting', SettingController::class)->only(['index', 'store']);
    Route::resource('/activity', ActivityController::class);
    Route::resource('/content', ContentController::class);
});

Route::get('/bot/telegram', function() {
    $response = new Api(config('telegram.bot_token'));
    $response = $response->getMe();
    $botId = $response->getId();
    $firstName = $response->getFirstName();
    $username = $response->getUsername();

    return response()->json([
        'bot_id' => $botId,
        'firstName' => $firstName,
        'username' => $username
    ]);
});

Route::get('/bot/sendmessage', function() {
    $telegram = new Api(config('telegram.bot_token'));
    $response = $telegram->sendMessage([
        'chat_id' => 491937914,
        'text' => 'Hello World'
    ]);

    $messageId = $response->getMessageId();

    return response()->json($response->toArray());
});

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);


