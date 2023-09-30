<?php

namespace NormanHuth\HelpersLaravel\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureGitHubTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request                                                         $request
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = config('services.github.webhook_token');

        if (
            !$token ||
            hash_equals(
                'sha256=' . hash_hmac('sha256', $request->getContent(), $token),
                $request->header('x-hub-signature-256')
            )
        ) {
            return $next($request);
        }

        abort(404, 'Could not verify GitHub Webhook secret.');
    }
}
