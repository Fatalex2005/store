<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check() && Auth::user()->hasRole($roles)) {
            return $next($request);
        }
        throw new ApiException(403, 'Forbidden for you');
    }
}

