<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\EnrollCourse as Enroll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsEnrolled
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
        if(Enroll::where('status', '1')->where('user_id', Auth::user()->id)->where('course_id', $request->course->id)->exists()){
            return $next($request);
        }

        alert()->warning('Opps..', 'You must enroll this course to enter');

        return redirect()->back();
    }
}
