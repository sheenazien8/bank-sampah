<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ShowMenu extends Conversation
{
    protected $user;

    protected $email;

    public function tampilkanMenu()
    {
        $question = Question::create('Hai Selamat Datang di Bot Banksampah Mawar, silahakan pilih action di bawah ini.')
            ->fallback('Unable to create a new database')
            ->callbackId('create_database')
            ->addButtons([
                Button::create('Pendaftaran Bot Telegram Banking')->value(1),
                Button::create('Informasi Saldo')->value(2),
                Button::create('Informasi Arus Tabungan')->value(3),
            ]);

        $self = $this;
        /* info(print_r($question, true)); */
        $this->ask($question, function (Answer $answer) use ($self) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
                $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
                switch ($selectedValue) {
                    case 1:
                        $this->askEmail();
                        break;
                    case 2:
                        $this->askEmail();
                        break;
                    case 3:
                        $this->askEmail();
                        break;

                    default:

                        break;
                }
            }
        });
    }

    public function askEmail()
    {
        $this->ask('One more thing - what is your email?', function(Answer $answer) {
            // Save result
            $this->email = $answer->getText();

            $this->say('Great - that is all we need, '.$this->user);
        });
    }

    public function run()
    {
        $this->tampilkanMenu();
    }
}
