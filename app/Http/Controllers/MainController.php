<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function index(Request $request)
    {
        // $name = config('app.undefined', 'welcome');
        // dd($name);
        // dump($name);

        return view('welcome');
    }
}
