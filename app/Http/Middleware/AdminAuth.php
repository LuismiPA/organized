<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
        if (Auth::user() &&  Auth::user()->tipo == 'admin') {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->tipo == "propietario") {
            return redirect()->route("user.panel");
        }
        if (Auth::check() && Auth::user()->tipo == "trabajador") {
            return redirect()->route("worker.panel");
        }
        Auth::logout();
        return response()->view('auth.login');
    }
}
