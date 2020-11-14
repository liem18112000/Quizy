<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Role;
use App\Models\EnrollCourse as Enroll;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Imports\CourseImport;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * CourseController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function import(Request $request)
    {
        $dataTime = date('Ymd_His');

        $file = $request->file('file');

        $fileName = $dataTime . '-' . $file->getClientOriginalName();

        $savePath = public_path('/import/');

        $file->move($savePath, $fileName);

        Excel::import(new CourseImport, $savePath . $fileName);

        alert()->success('Done', 'Course import successfully');

        return redirect()->back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('course.index', [
            'courses' => Course::paginate(6)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:255'
        ]);

        $course = Course::create([
            'name'          => $request->name,
            'user_id'       => Auth::user()->id,
            'role_type_id'  => Auth::user()->role_type_id,
        ]);

        activity()
            ->performedOn($course)
            ->causedBy(Auth::user())
            ->log('New course created');

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
     * @param Course $course
     * @return Response
     */
    public function show(Course $course)
    {
        return view('course.show', [
            'course' => $course
        ]);
    }

    /**
     * @param Request $request
     * @param Course $course
     * @return RedirectResponse
     */
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

        return redirect()->route('student.course.exam', $course);

    }

}
