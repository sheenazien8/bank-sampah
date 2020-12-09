<?php

namespace App\Http\Controllers;

use Telegram\Bot\Api;

class BotTelegramController
{
    public function hanlde()
    {
        $response = new Api(config('telegram.token'));
        $botId = $response->getId();
        $response->sendMessage([
            'chat_id'
        ]);
        $response = $response->getMe();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();
    }
}
