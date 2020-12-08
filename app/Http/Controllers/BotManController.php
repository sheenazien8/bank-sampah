<?php

namespace App\Http\Controllers;

use App\Conversations\RegistrationConversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

class BotManController extends Controller
{
    /**
     * @return void
     */
    public function handle()
    {
        try {
            $config = [
                // Your driver-specific configuration
                "telegram" => [
                    "token" => config('telegram.bot_token')
                ]
            ];

            /* // Load the driver(s) you want to use */
            DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);
            // Create an instance
            $botman = BotManFactory::create($config);

            $botman->hears('start', function(BotMan $botMan) {
                $botMan->startConversation(new RegistrationConversation);
            });

            $botman->listen();
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
