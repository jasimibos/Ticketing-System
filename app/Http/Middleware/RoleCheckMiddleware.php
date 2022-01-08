<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class RoleCheckMiddleware
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
        if( auth()->user()->role == 2 ){
            if( User::findOrFail( auth()->user()->id )->status == 0 ){
                return abort(403);
            }
        }
        return $next($request);
    }
}
