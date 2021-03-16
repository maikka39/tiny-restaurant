<?php

namespace App\Listeners;

use App\Events\MailSent;
use App\Mail\EmailFromUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class SendMailConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MailSent  $event
     * @return void
     */
    public function handle(MailSent $event)
    {
        // validate the mail address and content
        request()->validate(['name' => 'required']);
        request()->validate(['email' => 'required|email']);
        request()->validate(['content' => 'required']);

        Mail::to(request('email'))
            ->queue(new EmailFromUser(request('content'), request('name')));

        return redirect::back()
            ->with('success_message','Email verzonden!');
    }
}
