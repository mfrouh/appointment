<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Dashboard
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
        if (auth()->check() && auth()->user()->role=='doctor' && auth()->user()->clinic) {
            return $next($request);
        }
        if (auth()->check() && auth()->user()->role=='doctor') {
            return redirect('/myclinic');
        }
        if (auth()->check() && auth()->user()->role=='admin') {
            return $next($request);
        }
        return abort(404);
    }
}
