<?php

namespace App\Http\Controllers;

use App\PaymentPlatform;
use App\Plan;
use App\Resolvers\PaymentPlatformResolver;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    protected $paymentPlatformResolver;

    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        $this->middleware('auth');

        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    public function show()
    {
        $paymentPlatforms = PaymentPlatform::/*where('subscriptions_enabled', true)->*/get();

        return view('subscribe')->with([
            'plans' => Plan::all(),
            'paymentPlatforms' => $paymentPlatforms,
        ]);
    }

    public function store()
    {

    }

    public function approval()
    {

    }

    public function cancelled()
    {

    }
}
