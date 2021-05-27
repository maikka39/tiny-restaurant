<?php

namespace App\Http\Controllers;

use App\Mail\EmailFromUser;
use App\Models\NewsItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SendEmailRequest;

class ContactController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function view()
    {
        return view('site.contact');
    }

    public function sendMail(SendEmailRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();

        if(is_null($request['project'])) {
            $request['project'] = "";
        }

        Mail::queue(new EmailFromUser($validated['message'], $validated['firstname'], $validated['lastname'], $validated['email'], $request['project']));

        $request->session()->flash('success_message', 'Email verzonden!');

        return back();
    }
}