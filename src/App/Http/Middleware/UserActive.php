<?php

namespace NormanHuth\HelpersLaravel\App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;

class UserActive
{
    /**
     * Handle an incoming request.
     *
     * @param Request                                       $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($user = $request->user()) {
            User::withoutTimestamps(
                fn() => $user->update(['active_at' => now()])
            );
        }

        return $next($request);
    }
}
