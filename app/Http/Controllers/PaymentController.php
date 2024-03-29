<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\DonationPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;

class PaymentController extends Controller
{
    public function info(Request $request)
    {
        $donationPage = DonationPage::first();

        $mollie = new MollieApiClient();
        $mollie->setApiKey($donationPage->mollie_api_key);

        $payment_id = $request->session()->get('payment_id');

        try {
            $payment = $mollie->payments->get($payment_id);
        } catch (ApiException $error) {
            // Payment probably doesn't exist
            return redirect(URL::to('/'));
        }

        return view('site.paymentResult', [
            'status' => $payment->status,
            'amount' => $payment->amount->value,
            'donationPage' => $donationPage,
        ]);
    }

    public function new(PaymentRequest $request)
    {
        $donationPage = DonationPage::first();

        $validated = $request->validated();
        $amount = number_format((float) $validated['amount'], 2, '.', '');

        try {
            $mollie = new MollieApiClient();
            $mollie->setApiKey($donationPage->mollie_api_key);
            $payment = $mollie->payments->create([
                'amount' => [
                    'currency' => 'EUR',
                    'value' => "$amount",
                ],
                'description' => 'Tiny Restaurant donatie via website',
                'redirectUrl' => route('payment.info'),
            ]);
            $request->session()->put('payment_id', $payment->id);

            return redirect($payment->getCheckoutUrl());
        } catch (ApiException $error) {
            return back()->withErrors(['donation_error' => 'Er is iets misgegaan. Probeer het opnieuw!']);
        }
    }
}
