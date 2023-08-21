<?php

namespace NormanHuth\HelpersLaravel\App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * With this middleware there are opportunities:
 * 1: No token and the user is considered a guest
 * 2: The user is using a valid sanctum token and is logged in
 * 3: The user is using an invalid sanctum token, and get a 401 abort
 */
class SanctumOrGuest
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return RedirectResponse|Response|mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->bearerToken()) {
            $guard = Auth::guard('sanctum');
            if (!$guard->check()) {
                abort(ResponseAlias::HTTP_UNAUTHORIZED, __('Invalid token'));
            }
            Auth::setUser(
                Auth::guard('sanctum')->user()
            );
        }

        return $next($request);
    }
}
