<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Role;
use App\Models\EnrollCourse as Enroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('course.index', [
            'courses' => Course::paginate(3)
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function full()
    {
        return view('course.full', [
            'courses' => Course::paginate(6)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $course = Course::create([
            'name'      => $request->name,
            'user_id'     => $user->id,
            'role_type_id' =>$user->role_type_id,
        ]);

        if($course){
            alert()->success('Done', 'Course saved successfully...');
        }else{
            alert()->error('Failed', 'Course saved failed...');
        }
        return redirect()->route('course.show', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.show', [
            'course' => $course
        ]);
    }

    public function enroll(request $request, Course $course)
    {
        if(Enroll::where('status', '1')->where('user_id', Auth::user()->id)->where('course_id', $course->id)->exists())
        {
            alert()->warning('Already enrolled', 'You are already enrolled this course');

            return redirect()->back();
        }

        $enroll = Enroll::create([
            'course_id'     => $course->id,
            'user_id'       => Auth::user()->id,
            'role_type_id'  => '1',
        ]);

        activity()
            ->performedOn($enroll)
            ->causedBy(Auth::user())
            ->log('Enroll course');

        alert()->success('Done', 'You have successfully enrolled this course!');

        return redirect()->route('exam.index', $course);

    }

}
