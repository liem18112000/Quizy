<?php

namespace App\Http\Controllers;

use App\Models\User as Lecturer;
use App\Models\ExamType;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Choice;
use App\Models\UserRequest;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;;
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
            'examTypes' => ExamType::all(),
            'course'    => $course,
            'exams'     => $course->exams,
        ]);
    }

    public function storeExam(Request $request, Course $course)
    {
        $exam = Exam::create([
            'course_id' => $course->id,
            'title'     => $request->title,
            'user_id'   => Auth::user()->id,
            'aLlow_time' => $request->alow_time,
            'duration_min' => $request->duration,
            'exam_type_id'  => $request->exam_type_id,
        ]);

        activity()
            ->performedOn($exam)
            ->causedBy(Auth::user())
            ->log('New exam created');

        alert()->success('Done', 'New exam created');

        return redirect()->route('lecturer.course.exam', $course);
    }

    public function questions(Course $course, Exam $exam)
    {
        return view('lecturer.question', [
            'course'    => $course,
            'exam'     => $exam,
            'questions'  => $exam->questions
        ]);
    }

    public function storeQuestion(Request $request, Course $course, Exam $exam)
    {
        $question = Question::create([
            'description'   => $request->description,
            'course_id'     => $course->id,
            'exam_id'       => $exam->id,
            'answer_choice_id' => $request->mark ? '1' : $request->mark,
        ]);

        $choices = null;

        if($exam->examType->id == '1'){

            for ($i = 0; $i < 4; $i++) {
                $choices[$i] = Choice::create([
                    'exam_id'       => $exam->id,
                    'question_id'   => $question->id,
                    'description'   => $request->input('choice' . $i),
                ]);
            }

            $question->update([
                'answer_choice_id' => $choices[$request->answer]->id,
            ]);

            alert()->success('Done', 'New question and choices created');
        }

        activity()
            ->performedOn($exam)
            ->causedBy(Auth::user())
            ->log('New exam created');

        return redirect()->route('lecturer.course.exam', $course);
    }

    public function dashboard()
    {
        return view('lecturer.dashboard',[
            'courses'       => Course::all(),
            'teachCourses'  => Auth::user()->roles->where('role_type_id','2')->first()->teachCourse
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
