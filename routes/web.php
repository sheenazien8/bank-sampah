<?php

use App\Http\Controllers\ActivityController;
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
use Telegram\Bot\Api;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

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
    Route::resource('/activity', ActivityController::class);
    Route::get('/content', [ContentController::class, 'index'])->name('content.index');
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

Route::match(['get', 'post'], '/botman', function ()
{
    $config = [
        // Your driver-specific configuration
        "telegram" => [
            "token" => config('telegram.bot_token')
        ]
    ];

    // Load the driver(s) you want to use
    DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);

    // Create an instance
    $botman = BotManFactory::create($config);
});


