<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$guard=null)
    {
        if (auth()->check() && auth()->user()->role==$guard) {
            return $next($request);
        }
        return abort('404');
    }
}
