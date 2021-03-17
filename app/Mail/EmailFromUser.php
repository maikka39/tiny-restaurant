<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailFromUser extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $name;

    /**
     * Create a new message instance.
     *
     * @param $message
     * @param string $name
     */
    public function __construct(string $message, string $name)
    {
        $this->message = $message;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): EmailFromUser
    {
        return $this->markdown('emails.EmailFromUser')
            ->subject('Email voor Tiny Restaurant (via website)');
    }
}
