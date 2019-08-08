<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->checkroll()->first()->roll=='store'){
                return redirect('/store');
            }
            if(Auth::user()->checkroll()->first()->roll=='admin'){
                return redirect('/admin');
            }

            if(Auth::user()->checkroll()->first()->roll=='user'){

                return redirect('/userpanel');
            }
            return $next($request);
        }else{
            return redirect('/login');

        }
    }
}
