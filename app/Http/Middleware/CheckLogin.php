<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckLogin
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
        if (Auth::user()->role == 0){
            Session::flash('error', "Account does not have access!");
            return redirect()->route('route_admin_login');
        }
        if (Auth::user()->status == 0){
            Session::flash('error', "Account is disabled. Contact admin for support!");
            return redirect()->route('route_client_login');
        }
        return $next($request);
    }
}
