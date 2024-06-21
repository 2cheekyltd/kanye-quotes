<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('API-TOKEN');
        \Log::info('Received token: ' . $token); // Debug statement

        if ($token !== config('app.api_token')) {
            \Log::error('Unauthorized access attempt with token: ' . $token); // Add error log
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
