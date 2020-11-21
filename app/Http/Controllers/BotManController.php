<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

class BotManController extends Controller
{
    /**
     * undocumented function
     *
     * @return void
     */
    public function handle()
    {
        /* $TOKEN = config('telegram.bot_token'); */
        /* $apiURL = "https://api.telegram.org/bot$TOKEN"; */
        /* $update = json_decode(file_get_contents("php://input"), TRUE); */
        /* $chatID = $update["message"]["chat"]["id"]; */
        /* Log::info($chatID); */
        /* $message = $update["message"]["text"]; */

        /* if (strpos($message, "/start") === 0) { */
        /*     file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Haloo.&parse_mode=HTML"); */
        /* } */

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

            $botman->hears('hi', function(BotMan $botMan) {
                $botMan->ask('Hello! What is your Name?', function(Answer $answer) use ($botMan) {
                    $name = $answer->getText();
                    $botMan->reply('Hello '. $name);
                });
            });

            /* return view('app.botman.index'); */

            $botman->listen();
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
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

        $botman->hears('hi', function(BotMan $botMan) {
            $botMan->reply('Yep 🤘');
        });

        $botman->listen();
        /* return view('app.botman.index'); */
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
            $name = $answer->getText();
            $this->say('Nice to meet you '.$name);
        });
    }
}
