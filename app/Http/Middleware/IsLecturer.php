<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLecturer
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
        if (strtolower(Auth::user()->role->roleType->name) == 'lecturer')
            return $next($request);
        else {
            alert()->warning('Permission denied, You are not allowed to access this resource');
            return redirect()->back();
        }
    }
}
