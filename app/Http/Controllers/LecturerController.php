<?php

namespace App\Http\Controllers;

use App\Models\User as Lecturer;
use App\Models\Course;
use App\Models\Exam;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('lecturer');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'lecturers.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport, 'lecturers.xlsx');

        return redirect('/')->with('success', 'All good!');
    }

    public function courses()
    {
        $teachings = Auth::user()->roles->where('role_type_id', '2')->first()->teachCourse;

        $courses = null;

        foreach($teachings as $teaching){
            $courses[] = $teaching->forCourse;
        }

        return view('lecturer.course', [
            'courses'    => $courses
        ]);
    }

    public function exams(Course $course)
    {
        return view('lecturer.exam', [
            'course'    => $course,
            'exams'     => $course->exams,
        ]);
    }

    public function questions(Course $course, Exam $exam)
    {
        return view('lecturer.question', [
            'course'    => $course,
            'exam'     => $exam,
            'questions'  => $exam->questions
        ]);
    }
}
