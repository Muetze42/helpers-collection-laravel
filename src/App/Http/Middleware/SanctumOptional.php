<?php

namespace NormanHuth\HelpersLaravel\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SanctumOptional
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->bearerToken()) {
            $guard = Auth::guard('sanctum');
            if ($guard->check()) {
                Auth::setUser(
                    Auth::guard('sanctum')->user()
                );
            }
        }

        return $next($request);
    }
}
