<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Mail\EmailFromUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class MailController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function sendMail(SendEmailRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        Mail::queue(new EmailFromUser($validated['message'], $validated['name'], $validated['email']));

        $request->session()->flash('success_message', 'Email verzonden!');

        return back();
    }
}
