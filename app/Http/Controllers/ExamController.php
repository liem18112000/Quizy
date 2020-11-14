<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Course;
use App\Models\DoingExam;
use App\Exports\ExamsExport;
use App\Imports\ExamsImport;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExamController extends Controller
{

    /**
     * ExamController constructor.
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
        return Excel::download(new ExamsExport, 'exams.xlsx');
    }

    /**
     * @param Request $request
     * @param Course $course
     * @return RedirectResponse
     */
    public function import(Request $request, Course $course)
    {
        $dataTime = date('Ymd_His');

        $file = $request->file('file');

        $fileName = $dataTime . '-' . $file->getClientOriginalName();

        $savePath = public_path('/import/');

        $file->move($savePath, $fileName);

        Excel::import(new ExamsImport($course), $savePath . $fileName);

        alert()->success('Done', 'Exams import successfully');

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Course $course)
    {
        return view('exam.index', [
            'exams'     => $course->exams,
            'course'    => $course
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @param Exam $exam
     * @return Response
     */
    public function show(Course $course, Exam $exam)
    {
        $doing = DoingExam::where('status', '1')->where('course_id', $course->id)->where('exam_id', $exam->id)->where('user_id', Auth::user()->id)->first();

        if(!$doing)
        {
            $doing = DoingExam::create([
                'user_id'       => Auth::user()->id,
                'course_id'     => $course->id,
                'exam_id'       => $exam->id,
                'role_type_id'  => '1',
                'remain_time'   => strval(intval($exam->duration_min * 60))
            ]);

            activity()
                ->performedOn($doing)
                ->causedBy(Auth::user())
                ->log('Exam continue');

            alert()->info('Exam start', 'Examinees have ' .  $exam->duration_min . ' minutes to complete');

            return view('exam.show', [
                'course'    => $course,
                'exam'      => $exam,
                'questions' => $exam->questions,
                'doing'     => $doing
            ]);
        }

        activity()
            ->performedOn($doing)
            ->causedBy(Auth::user())
            ->log('Exam taked');

        alert()->info('Exam resume', 'Examinees have ' .  intval($doing->remain_time) / 60 . ' minutes ' . intval($doing->remain_time) % 60 . ' seconds left');

        return redirect()->route('exam.resume', [
            'course'    => $course,
            'exam'      => $exam,
        ]);
    }

    /**
     * @param Request $request
     * @param Course $course
     * @param Exam $exam
     * @param DoingExam $doing
     * @return RedirectResponse
     */
    public function submit(Request $request, Course $course, Exam $exam, DoingExam $doing)
    {
        $request->validate([
            'isPause'          => 'required',
            'time_remain'      => 'required'
        ]);

        if (isset($request->isPause)) {
            if($request->isPause == 'true')
            {
                return $this->pause($request, $course, $exam, $doing);
            }
        }

        $answer = null;

        $score = 0;

        if (isset($exam->examType)) {

            if($exam->examType->id != '2'){

                foreach ($exam->questions as $question) {
                    $answer[] = $question->answer_choice_id;
                }

                for ($i = 0; $i < count($answer); $i++) {
                    $value1 = strval($request->input('choice' . strval($i + 1)));

                    $value2 = strval(($answer[$i] - 1) % 4 + 1);

                    if ($value1 == $value2) {
                        $score += 1.0;
                    }
                }
            }
        }

        $data =  json_encode($request->except(['time_remain', '_token']));

        $doing->update([
            'remain_time'   => intval($request->time_remain) <= 0 ? 0 : $request->time_remain,
            'answer'        => $data,
            'grade'         => $score,
            'status'        => '0',
        ]);

        activity()
            ->performedOn($doing)
            ->causedBy(Auth::user())
            ->log('Exam submit');

        return redirect()->route('exam.result', [
            'course'    => $course,
            'exam'      => $exam,
            'doing'     => $doing,
        ]);
    }

    /**
     * @param Request $request
     * @param Course $course
     * @param Exam $exam
     * @param DoingExam $doing
     * @return RedirectResponse
     */
    public function pause(Request $request, Course $course, Exam $exam, DoingExam $doing)
    {
        $data =  json_encode($request->except(['time_remain', 'isPause', '_token']));

        if (isset($request->time_remain)) {
            $doing->update([
                'remain_time' => intval($request->time_remain) <= 0 ? 0 : $request->time_remain,
                'answer'    => $data,
            ]);
        }

        activity()
            ->performedOn($doing)
            ->causedBy(Auth::user())
            ->log('Exam paused');

        alert()->success('Exam paused', 'You can continue anytime!');

        return redirect()->route('student.course.exam', $course);
    }

    /**
     * @param Request $request
     * @param Course $course
     * @param Exam $exam
     * @return Application|Factory|View
     */
    public function resume(Request $request, Course $course, Exam $exam)
    {
        $doing = DoingExam::where('status', '1')->where('course_id', $course->id)->where('exam_id', $exam->id)->where('user_id', Auth::user()->id)->first();

        activity()
            ->performedOn($doing)
            ->causedBy(Auth::user())
            ->log('Exam taked');

        alert()->info('Exam resume', 'Examinees have ' .  floor(intval($doing->remain_time) / 60) . ' minutes ' . intval($doing->remain_time) % 60 . ' seconds left');

        return view('exam.show', [
            'course'    => $course,
            'exam'      => $exam,
            'questions' => $exam->questions,
            'doing'     => $doing,
            'answer'    => json_decode($doing->answer, true),
        ]);
    }

    public function result(Course $course, Exam $exam, DoingExam $doing)
    {
        alert()->success('Exam submitted', 'Well, Your score is good!');

        return view('exam.result', [
            'course'    => $course,
            'exam'      => $exam,
            'doing'     => $doing,
        ]);
    }

}
