<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // die('dskhfjdkgd');
        if (Auth::guard($guard)->check()) 
        {
            die('dfhfdh');
            return redirect('/');
        }

        return $next($request);
    }
}
