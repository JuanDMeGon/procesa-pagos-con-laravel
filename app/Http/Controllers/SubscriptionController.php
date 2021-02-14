<?php

namespace App\Http\Controllers;

use App\PaymentPlatform;
use App\Plan;
use App\Resolvers\PaymentPlatformResolver;
use App\Subscription;
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
        $paymentPlatforms = PaymentPlatform::where('subscriptions_enabled', true)->get();

        return view('subscribe')->with([
            'plans' => Plan::all(),
            'paymentPlatforms' => $paymentPlatforms,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'plan' => ['required', 'exists:plans,slug'],
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
        ];

        $request->validate($rules);

        $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService($request->payment_platform);

        session()->put('subscriptionPlatformId', $request->payment_platform);

        return $paymentPlatform->handleSubscription($request);
    }

    public function approval(Request $request)
    {
        $rules = [
            'plan' => ['required', 'exists:plans,slug']
        ];

        $request->validate($rules);

        $plan = Plan::where('slug', $request->plan)->firstOrFail();
        $user = $request->user();

        $subscription = Subscription::create([
            'active_until' => now()->addDays($plan->duration_in_days),
            'user_id' => $user->id,
            'plan_id' => $plan->id,
        ]);

        return redirect()
            ->route('home')
            ->withSuccess(['payment' => "Thanks, {$user->name}. You have a {$plan->slug} subscription. Start using it."]);

    }

    public function cancelled()
    {
        return redirect()
            ->route('subscribe.show')
            ->withErrors('You cancelled. Comeback whenever you\'re ready :)');
    }
}
