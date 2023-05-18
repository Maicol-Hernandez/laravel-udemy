<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function index(Request $request)
    {
        // DB::connection()->enableQueryLog();
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}
