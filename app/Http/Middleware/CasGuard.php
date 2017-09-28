<?php

namespace App\Http\Middleware;

use Closure;
use App\Classes\EGuard;
use Response;

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
        if(EGuard::authenticated())
          return $next($request);
        else
          return abort(403, 'Unauthorized');
    }
}
