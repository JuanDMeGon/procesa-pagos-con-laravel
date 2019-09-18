<?php

namespace App\Http\Controllers;

use App\Currency;
use App\PaymentPlatform;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currencies = Currency::all();
        $paymentPlatforms = PaymentPlatform::all();

        return view('home')->with([
            'currencies' => $currencies,
            'paymentPlatforms' => $paymentPlatforms,
        ]);
    }
}
