<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user('sanctum');
        if ($user && $user->role_id === 1 ) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized - Admins only'], 403);
    }
}
