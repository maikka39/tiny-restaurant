<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;

class DonationController extends Controller
{
    public function newDonation(Request $request)
    {
        $amount = number_format((float)$request->amount, 2, '.', '');

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