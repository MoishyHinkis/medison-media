<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class NonTrustIps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $locationData = Location::get($ip);
        if (!$locationData || collect(['UK', 'AU'])->contains($locationData->countryCode)) {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
