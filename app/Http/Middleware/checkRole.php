<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedRoles = array_slice(func_get_args(), 2);
        // dd($allowedRoles);
        $user = Auth::user();
        // dd($user->isRole());
        if (Auth::check()) {
            // dd($user->isRole());
            foreach ($allowedRoles as $role) {
                if ('admin' == $role && $user->isAdmin()) {
                    return $next($request);
                } elseif ('auditor' == $role && $user->isAuditor()) {
                    return $next($request);
                } elseif ('user' == $role && $user->isUser()) {
                    return $next($request);
                }
            }
            return \abort(403);
        }
        return \abort(403);
    }
}
