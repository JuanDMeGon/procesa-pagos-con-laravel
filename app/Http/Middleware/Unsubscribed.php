<?php

namespace App\Http\Middleware;

use Closure;

class Unsubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (optional($request->user())->hasActiveSubscription()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
