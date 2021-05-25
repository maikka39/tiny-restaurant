<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailFromUser extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $message;
    public $name;
    public $sender;

    /**
     * Create a new message instance.
     */
    public function __construct(string $message, string $name, string $sender)
    {
        $this->message = $message;
        $this->name = $name;
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): EmailFromUser
    {
        return $this->markdown('emails.EmailFromUser')
            ->to('info@stichtingmiep.nl')
            ->from($this->sender)
            ->subject('Email voor Tiny Restaurant (via website)');
    }
}
