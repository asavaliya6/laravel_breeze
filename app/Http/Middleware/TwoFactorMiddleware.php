<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && !$request->user()->two_factor_verified) {
            return redirect()->route('verify');
        }

        return $next($request);
    }
}
