<?php

namespace App\Conversations;

use App\Models\User;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Support\Facades\Log;

class RegistrationConversation extends Conversation
{
    protected $user;

    protected $email;

    public function tanyaNomorRekening()
    {
        $this->ask('Silahkan masukkan nomor rekening mu', function(Answer $answer) {
            // Save result
            $this->user = User::where('nomor_rekening', $answer->getText())->first();
            Log::debug($this->user());
            if (!$this->user) {

            }
            $this->say($answer->getText());
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
        // This will be called immediately
        $this->tanyaNomorRekening();
    }
}
