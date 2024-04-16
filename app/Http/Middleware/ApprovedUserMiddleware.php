<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
class ApprovedUserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->is_approved != 1) {
           
            return response()->json(['error' => 'Unauthorized.'], 403);

        }
        return $next($request);
    }
}



