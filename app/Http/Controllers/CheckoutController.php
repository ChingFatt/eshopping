<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Validator;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class CheckoutController extends Controller
{
   	public function index()
	{
		return view('checkout.index');
	}

	public function store(Request $request)
    {
        try {
            $charge = Stripe::charges()->create([
                'amount' => $request->total,
                'currency' => 'SGD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
            ]);

            //successful
            Cart::clear();
            return redirect()->route('checkout.success');
        } catch (Exception $e) {

        }
    }

    public function success()
    {
        return view('checkout.success');
    }
}
