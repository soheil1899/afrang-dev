<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
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
        if (Auth::guard($guard)->check()) {

            if(Auth::user()->checkroll()->first()->roll=='admin'){
                return $next($request);
            }else{
                return redirect('/');
            }
            if(Auth::user()->checkroll()->first()->roll=='store'){
                return $next($request);
            }else{
                return redirect('/');
            }

        }else{
            return redirect('/');

        }
    }
}
