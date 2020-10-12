<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsAdmin
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
        if( strtolower(Auth::user()->role->roleType->name) == 'admin')
            return $next($request);
        else{
            alert()->warning('Permission denied, You are not allowed to access this resource');
            return redirect()->back();
        }
    }
}
