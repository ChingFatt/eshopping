<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
	public function home()
	{
        $products = Product::paginate();

		return view('page.home')->with(compact('products'));
	}
}
