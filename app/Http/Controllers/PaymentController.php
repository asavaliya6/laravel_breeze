<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Payment;

class PaymentController extends Controller
{
    //PAYPAL PAYMENT METHODS
    
    public function paypalpayment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $accessToken = $provider->getAccessToken();

        if (!$accessToken) {
            return redirect()->route('paypal.cancel')->with('error', 'Unable to get PayPal access token.');
        }

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price,
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    session()->put('product_name', $request->product_name);
                    session()->put('quantity', $request->quantity);
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('paypal.cancel')->with('error', 'Something went wrong while processing your payment.');
    }

    public function paypalSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $accessToken = $provider->getAccessToken();

        if (!$accessToken) {
            return redirect()->route('paypal.cancel')->with('error', 'Unable to get PayPal access token.');
        }

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $payment = new Payment();
            $payment->payment_id = $response['id'];
            $payment->product_name = session()->get('product_name');
            $payment->quantity = session()->get('quantity');
            $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->payer_name = $response['payer']['name']['given_name'];
            $payment->payer_email = $response['payer']['email_address'];
            $payment->payment_status = $response['status'];
            $payment->payment_method = "PayPal";
            $payment->save();

            session()->forget(['product_name', 'quantity']);

            return redirect()->route('paypal.success.view')->with('success', 'Payment is successful.');
        }

        return redirect()->route('paypal.cancel')->with('error', 'Payment could not be completed.');
    }

    public function paypalCancel()
    {
        return view('payments.paypal_cancel')->with('error', 'Payment has been cancelled.');
    }

    //STRIPE PAYMENT METHODS
    
    public function stripePayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => $request->email, 
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $request->product_name,
                    ],
                    'unit_amount' => $request->price * 100,
                ],
                'quantity' => $request->quantity,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe.cancel'),
        ]);

        session()->put('product_name', $request->product_name);
        session()->put('quantity', $request->quantity);
        session()->put('email', $request->email); 

        return redirect()->away($session->url);
    }

    public function stripeSuccess(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        if (!$request->has('session_id')) {
            return redirect()->route('stripe.cancel')->with('error', 'Invalid session ID.');
        }

        $session = Session::retrieve($request->session_id);

        $payment = new Payment();
        $payment->product_name = session()->get('product_name');
        $payment->quantity = session()->get('quantity');
        $payment->amount = 10;
        $payment->currency = "USD";
        $payment->payment_status = "COMPLETED";
        $payment->payment_method = "Stripe";
        $payment->payment_id = $session->payment_intent ?? null; 
        $payment->payer_name = "N/A"; 
        $payment->payer_email = $session->customer_email ?? session()->get('email'); 
        $payment->save();

        session()->forget(['product_name', 'quantity', 'email']);

        return view('payments.stripe_success')->with('success', 'Payment is successful.');
    }

    public function stripeCancel()
    {
        return view('payments.stripe_cancel')->with('error', 'Payment has been cancelled.');
    }
}
