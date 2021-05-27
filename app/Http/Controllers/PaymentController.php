<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;

class PaymentController extends Controller
{
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
                "redirectUrl" => env("APP_URL")."/betaling" //TODO: Replace with actual redirect URL once donation frontend is finished
            ]);
            return redirect($payment->getCheckoutUrl());
        } catch (ApiException $error) {
            return back()->withErrors(["donation_error" => "Er is iets mis gegaan. Probeer het opnieuw!"]);
        }
    }
}
