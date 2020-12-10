<?php

return [
    'token' => env('TELEGRAM_BOT_TOKEN'),
    'bot_token' => env('TELEGRAM_BOT_TOKEN'),
    'bots' => [
        'mybots' => [
            'username' => 'banksampahbot',
            'token' => env('TELEGRAM_BOT_TOKEN'),
            'certificate_path' => env('TELEGRAM_CERTIFICATE_PATH', 'DEFAULT'),
            'webhook_url' => env('TELEGRAM_WEBHOOK_URL', 'DEFAULT')
        ]
    ]
];
