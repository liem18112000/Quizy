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
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Maatwebsite\Excel\Facades\Excel;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LecturerController extends Controller
{
    /**
     * LecturerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('lecturer');
    }

    /**
     * @return BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'lecturers.xlsx');
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function import()
    {
        Excel::import(new UsersImport, 'lecturers.xlsx');

        return redirect('/')->with('success', 'All good!');
    }

    public function courses()
    {
        $courses    = null;
        $teachings  = null;

        if (isset(Auth::user()->roles)) {
            $teachings = Auth::user()->roles->where('role_type_id', '2')->first()->teachCourse;
        }

        if (isset($teachings)) {
            foreach($teachings as $teaching){
                $courses[] = $teaching->forCourse;
            }
        }

        return view('lecturer.course', [
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
            return view('lecturer.exam', [
                'examTypes' => ExamType::all(),
                'course'    => $course,
                'exams'     => $course->exams,
            ]);
        }

        alert()->warning('Ops', 'Something went wrong?');

        return redirect()->back();
    }

    public function storeExam(Request $request, Course $course)
    {
        $request->validate([
            'title'         => 'required|max:255',
            'aLlow_time'    => 'required',
            'duration_min'  => 'required',
            'exam_type_id'  => 'required',
        ]);

        $exam = null;

        if (isset($course->id)) {
            if (isset(Auth::user()->id)) {
                $exam = Exam::create([
                    'course_id'     => $course->id,
                    'title'         => $request->title,
                    'user_id'       => Auth::user()->id,
                    'aLlow_time'    => $request->alow_time,
                    'duration_min'  => $request->duration,
                    'exam_type_id'  => $request->exam_type_id,
                ]);
            }
        }

        activity()
            ->performedOn($exam)
            ->causedBy(Auth::user())
            ->log('New exam created');

        alert()->success('Done', 'New exam created');

        return redirect()->route('lecturer.course.exam', $course);
    }

    /**
     * @param Course $course
     * @param Exam $exam
     * @return Application|Factory|View
     */
    public function questions(Course $course, Exam $exam)
    {
        return view('lecturer.question', [
            'course'    => $course,
            'exam'     => $exam,
            'questions'  => $exam->questions
        ]);
    }

    /**
     * @param Request $request
     * @param Course $course
     * @param Exam $exam
     * @return RedirectResponse
     */
    public function storeQuestion(Request $request, Course $course, Exam $exam)
    {
        $request->validate([
            'description'       => 'required',
            'answer_choice_id'  => 'required',
            'answer'            => 'required'
        ]);

        $question = null;

        if (isset($course->id)) {
            if (isset($exam->id)) {
                $question = Question::create([
                    'description'       => $request->description,
                    'course_id'         => $course->id,
                    'exam_id'           => $exam->id,
                    'answer_choice_id'  => $request->mark,
                ]);
            }
        }

        $choices = null;

        if (isset($exam->examType)) {
            if($exam->examType->id == '1'){

                for ($i = 0; $i < 4; $i++) {
                    if (isset($exam->id)) {
                        $choices[$i] = Choice::create([
                            'exam_id'       => $exam->id,
                            'question_id'   => $question->id,
                            'description'   => $request->input('choice' . $i),
                        ]);
                    }
                }

                if (isset($request->answer)) {
                    if (isset($choices[$request->answer])) {
                        $question->update([
                            'answer_choice_id' => $choices[$request->answer]->id,
                        ]);
                    }
                }

                alert()->success('Done', 'New question and choices created');
            }
        }

        activity()
            ->performedOn($exam)
            ->causedBy(Auth::user())
            ->log('New exam created');

        return redirect()->route('lecturer.course.exam', $course);
    }

    /**
     * @return Application|Factory|View
     */
    public function dashboard()
    {
        return view('lecturer.dashboard',[
            'courses'       => Course::all(),
            'teachCourses'  => Auth::user()->roles->where('role_type_id','2')->first()->teachCourse
        ]);
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
            'data'              => 'nullable',
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
