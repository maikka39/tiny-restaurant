<?php

namespace App\Http\Controllers;

use App\Mail\EmailFromUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SendEmailRequest;

class MailController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendMail(SendEmailRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        Mail::to($validated['email'])
            ->queue(new EmailFromUser($validated['message'], $validated['name']));

        $request->session()->flash('success_message', 'Email verzonden!');

        return redirect::back();
    }
}