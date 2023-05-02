<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::available()->get();
        return view('welcome', compact('products'));
    }
}
