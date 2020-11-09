<?php

namespace App\Http\Controllers;

use App\Models\User as Student;
use App\Models\Course;
use App\Models\UserRequest;
use App\Models\Exam;
use App\Models\DoingExam;
use Illuminate\Support\Facades\Auth;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'students.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport, 'students.xlsx');

        return redirect('/')->with('success', 'All good!');
    }

    public function courses()
    {
        $enrolls = Auth::user()->roles->where('role_type_id', '1')->first()->enrollCourse;

        $courses = null;

        foreach ($enrolls as $enroll) {
            $courses[] = $enroll->forCourse;
        }

        return view('student.course', [
            'courses'    => $courses
        ]);
    }

    public function exams(Course $course)
    {
        return view('student.exam', [
            'course'    => $course,
            'exams'     => $course->exams,
        ]);
    }

    public function result()
    {
        return view('student.result', [
            'results' => DoingExam::where('user_id', Auth::user()->id)->get()
        ]);
    }

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

    public function preview(Course $course, Exam $exam)
    {
        $doing = DoingExam::where('status', '0')->where('course_id', $course->id)->where('exam_id', $exam->id)->where('user_id', Auth::user()->id)->first();

        return view('student.preview', [
            'course'    => $course,
            'exam'      => $exam,
            'questions' => $exam->questions,
            'doing'     => $doing,
            'answer'    => json_decode($doing->answer, true),
        ]);
    }

    public function request(Request $request)
    {
        $UserRequest = UserRequest::create([
            'user_id'           => Auth::user()->id,
            'description'       => $request->description,
            'request_type_id'   => $request->request_type_id,
            'data'              => $request->data ? $request->data : null,
        ]);

        alert()->success('Done', 'UserRequest has been saved successfully');

        return redirect()->back();
    }
}
