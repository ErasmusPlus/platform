<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class AdminMiddleware
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
      $user = User::findOrFail(Auth::user()->id);
      
      if($user->role()->name != 'administrator')
        return abort(403, 'Access denied');
      else
        return $next($request);
    }
}
