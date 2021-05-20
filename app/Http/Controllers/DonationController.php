<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationRequest;
use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;

class DonationController extends Controller
{
    public function view()
    {
        return view('site.donate', []);
    }

    public function new(DonationRequest $request)
    {
        $validated = $request->validated();
        dd($validated['amount']);
        $amount = number_format((float)$request->validated()['amount'], 2, '.', '');

        $mollie = new MollieApiClient();

        try {
            $mollie->setApiKey(env("MOLLIE_API_KEY"));
        } catch (ApiException $e) {
            //TODO error handling
        }
        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "$amount"
            ],
            "description" => "Tiny Restaurant donatie via website",
            "redirectUrl" => env("APP_URL"),
            //TODO: "webhookUrl" => "http://comitto.serveo.net/transactions/update",
        ]);

        return redirect($payment->getCheckoutUrl());
    }
}