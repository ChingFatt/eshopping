<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show($slug)
	{
		$product = Product::where('slug', $slug)->first();

		return view('product.show')->with(compact('product'));	
	}
}
