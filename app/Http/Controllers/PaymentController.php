<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;
use Illuminate\Support\Facades\URL;
use App\Models\DonationPage;

class PaymentController extends Controller
{
    public function info(Request $request)
    {
        $mollie = new MollieApiClient();
        $mollie->setApiKey(env("MOLLIE_API_KEY"));

        $payment_id = $request->session()->get('payment_id');

        try {
            $payment = $mollie->payments->get($payment_id);
        } catch (ApiException $error) {
            // Payment probably doesn't exist
            return redirect(URL::to("/"));
        }

        return view('site.paymentResult', [
            'status' => $payment->status,
            'amount' => $payment->amount->value,
            'donationPage' => DonationPage::first(),
        ]);
    }

    public function new(PaymentRequest $request)
    {
        $validated = $request->validated();
        $amount = number_format((float)$validated['amount'], 2, '.', '');

        try {
            $mollie = new MollieApiClient();
            $mollie->setApiKey(env("MOLLIE_API_KEY"));
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => "$amount"
                ],
                "description" => "Tiny Restaurant donatie via website",
                "redirectUrl" => route("payment.info")
            ]);
            $request->session()->put('payment_id', $payment->id);
            return redirect($payment->getCheckoutUrl());
        } catch (ApiException $error) {
            return back()->withErrors(["donation_error" => "Er is iets mis gegaan. Probeer het opnieuw!"]);
        }
    }
}
