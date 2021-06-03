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
    public $firstname;
    public $lastname;
    public $sender;
    public $project;

    /**
     * Create a new message instance.
     */
    public function __construct(string $message, string $firstname, string $lastname, string $sender, string $project)
    {
        $this->message = $message;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->sender = $sender;
        $this->project = $project;
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
