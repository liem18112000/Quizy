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
        foreach (Auth::user()->roles as $role) {
            if (strtolower($role->roleType->name) == 'lecturer') {
                return $next($request);
            }
        }

        alert()->warning('Permission denied','You are not allowed to access this resource');
        return redirect()->back();
    }
}
