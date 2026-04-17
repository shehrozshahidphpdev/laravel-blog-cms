<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminOrEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles = ['admin', 'editor'];
        $user = Auth::user();

        if (! $user || ! in_array($user->role, $roles)) {
            abort(403, 'Unauthorized access. Only admins and editors can access this resource.');
        }

        return $next($request);
    }
}
