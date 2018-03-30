<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function showPrivacyPolicy()
    {
        return view('privacy-policy');
    }
    
    public function shop()
    {
        $products = Product::all();
        return view('shop',["products"=>$products->toArray()]);
    }
    public function showTermsAndConditions()
    {
        return view('terms-and-conditions');
    }
}
