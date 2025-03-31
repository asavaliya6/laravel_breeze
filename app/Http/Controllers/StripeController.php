<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\StripePayment;

class StripeController extends Controller
{
    public function stripePayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Phone',
                    ],
                    'unit_amount' => 10 * 100, 
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);

        session()->put('product_name', 'Phone');
        session()->put('quantity', 1);

        return redirect()->away($session->url);
    }

    public function success()
    {
        $payment = new StripePayment();
        $payment->product_name = session()->get('product_name');
        $payment->quantity = session()->get('quantity');
        $payment->amount = 10;
        $payment->currency = "USD";
        $payment->payment_status = "Success";
        $payment->payment_method = "Stripe";
        $payment->save();
    
        session()->forget(['product_name', 'quantity']);
    
        return view('stripe_success')->with('success', 'Payment is successful.');
    }
    
    public function cancel()
    {
        return view('stripe_cancel')->with('error', 'Payment has been cancelled.');
    }
}
