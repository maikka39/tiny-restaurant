<?php

namespace App\Http\Controllers;

use App\Mail\EmailFromUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(): \Illuminate\Http\RedirectResponse
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