<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Mail\EmailFromUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class ContactController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function view()
    {
        return view('site.contact');
    }

    public function sendMail(SendEmailRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        if (is_null($request['project'])) {
            $request['project'] = '';
        }

        Mail::queue(new EmailFromUser($validated['message'], $validated['firstname'], $validated['lastname'], $validated['email'], $request['project']));

        $request->session()->flash('success_message', 'Email verzonden!');

        return back();
    }
}
