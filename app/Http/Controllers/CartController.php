<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Validator;

class CartController extends Controller
{
	public function index()
	{
		return view('cart.index');
	}

    public function store(Request $request)
    {
        Cart::add($request->id, $request->title, $request->price, $request->quantity)->associate('App\Product');
        return redirect()->route('cart.index');
    }

    public function clear()
	{
		Cart::clear();
		return redirect()->route('cart.index');
	}

	public function remove($id)
	{
		Cart::remove($id);
		return redirect()->route('cart.index');
	}
}
