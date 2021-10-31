<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // If the user is not role 1 (admin role)
        if(auth()->guest() || auth()->user()->role != '1'){
            // Abort session, give error
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
