<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LogAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {     
        if ($request->is('login')) {
            dd("if");
            return $next($request);

        }
        dd("else");
        return redirect('/');
        // Check if the request is for the 'login' route
        // if ($request->is('login')) {
        //     if (Auth::guard('hospital')->check() || Auth::guard('admin')->check()) {
        //         return redirect('dashboard');
        //     }
        // }
        // return $next($request);
    }
}
