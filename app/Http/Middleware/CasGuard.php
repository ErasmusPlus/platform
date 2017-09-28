<?php

namespace App\Http\Middleware;

use Closure;

class CasGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('current_user'))
          return $next($request);
        else
          return redirect()->route('login');
    }
}
