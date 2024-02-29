<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrepreneurMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->role->name === 'Entrepreneur' && $user->status === 1) {
            return $next($request);
        }

        abort(403, 'Unauthorized.');
    }
}
