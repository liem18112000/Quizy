<?php

namespace App\Http\Controllers;

use App\Models\User as Student;
use App\Models\Course;
use App\Models\UserRequest;
use App\Models\Exam;
use App\Models\DoingExam;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StudentController extends Controller
{
    /**
     * StudentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'students.xlsx');
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function import()
    {
        Excel::import(new UsersImport, 'students.xlsx');

        return redirect('/')->with('success', 'All good!');
    }

    /**
     * @return Application|Factory|View
     */
    public function courses()
    {
        $enrolls = null;

        if (isset(Auth::user()->roles)) {
            $enrolls = Auth::user()->roles->where('role_type_id', '1')->first()->enrollCourse;
        }

        $courses = null;

        foreach ($enrolls as $enroll) {
            $courses[] = $enroll->forCourse;
        }

        return view('student.course', [
            'courses'    => $courses
        ]);
    }

    /**
     * @param Course $course
     * @return Application|Factory|View|RedirectResponse
     */
    public function exams(Course $course)
    {
        if (isset($course->exams)) {
            return view('student.exam', [
                'course'    => $course,
                'exams'     => $course->exams,
            ]);
        }

        alert()->warning('Ops', 'Something went wrong?');

        return redirect()->back();
    }

    /**
     * @return Application|Factory|View
     */
    public function result()
    {
        return view('student.result', [
            'results' => DoingExam::where('user_id', Auth::user()->id)->get()
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function dashboard()
    {

        $grades[] = DoingExam::where('user_id', Auth::user()->id)->where('status', '0')->where('grade', '<=', 10)->count();
        $grades[] = DoingExam::where('user_id', Auth::user()->id)->where('status', '0')->where('grade', '>', 10)->where('grade', '<=', 20)->count();
        $grades[] = DoingExam::where('user_id', Auth::user()->id)->where('status', '0')->where('grade', '>', 20)->where('grade', '<=', 30)->count();
        $grades[] = DoingExam::where('user_id', Auth::user()->id)->where('status', '0')->where('grade', '>', 30)->count();

        return view('student.dashboard',[
            'courses'       => Course::all(),
            'enrollCourses' => Auth::user()->roles->where('role_type_id', '1')->first()->enrollCourse,
            'exams'         => DoingExam::where('user_id', Auth::user()->id)->where('status', '0')->get(),
            'doing_exams'   => DoingExam::where('user_id', Auth::user()->id)->where('status', '0')->orderBy('updated_at', 'DESC')->limit(5)->get(),
            'grades'        => $grades
        ]);
    }

    /**
     * @param Course $course
     * @param Exam $exam
     * @return Application|Factory|View|RedirectResponse
     */
    public function preview(Course $course, Exam $exam)
    {
        $doing = DoingExam::where('status', '0')->where('course_id', $course->id)->where('exam_id', $exam->id)->where('user_id', Auth::user()->id)->first();

        if (isset($exam->questions)) {
            return view('student.preview', [
                'course'    => $course,
                'exam'      => $exam,
                'questions' => $exam->questions,
                'doing'     => $doing,
                'answer'    => json_decode($doing->answer, true),
            ]);
        }

        alert()->warning('Ops', 'Something went wrong?');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function request(Request $request)
    {
        $request->validate([
            'description'       => 'required',
            'request_type_id'   => 'required',
            'data'              => 'nullable'
        ]);

        if (isset(Auth::user()->id)) {
            $userRequest = UserRequest::create([
                'user_id'           => Auth::user()->id,
                'description'       => $request->description,
                'request_type_id'   => $request->request_type_id,
                'data'              => $request->data ? $request->data : null,
            ]);
        }

        alert()->success('Done', 'UserRequest has been saved successfully');

        return redirect()->back();
    }
}
