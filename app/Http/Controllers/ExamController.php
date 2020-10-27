<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Course;
use App\Models\DoingExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('enroll');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        return view('exam.index', [
            'exams' => Exam::all(),
            'course' => $course
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
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

    public function submit(Request $request, Course $course, Exam $exam, DoingExam $doing)
    {
        if($request->isPause == 'true')
        {
            return $this->pause($request, $course, $exam, $doing);
        }

        $answer = null;

        $score = 0;

        foreach($exam->questions as $question)
        {
            $answer[] = $question->answer_choice_id;
        }

        for($i = 0; $i < count($answer); $i++)
        {
            $value1 = strval($request->input('choice' . strval($i + 1)));

            $value2 = strval(($answer[$i] - 1) % 4 + 1);

            if($value1 == $value2)
            {
                $score += 1.0;
            }
        }

        $data =  json_encode($request->except(['time_remain', '_token']));
        $doing->update([
            'remain_time' => intval($request->time_remain) <= 0 ? 0 : $request->time_remain,
            'answer'    => $data,
            'grade'     => $score,
            'status'    => '0',
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

    public function pause(Request $request, Course $course, Exam $exam, DoingExam $doing)
    {
        $data =  json_encode($request->except(['time_remain', 'isPause', '_token']));

        $doing->update([
            'remain_time' => intval($request->time_remain) <= 0 ? 0 : $request->time_remain,
            'answer'    => $data,
        ]);

        activity()
            ->performedOn($doing)
            ->causedBy(Auth::user())
            ->log('Exam paused');

        alert()->success('Exam paused', 'You can continue anytime!');

        return redirect()->route('exam.index', $course);
    }

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
        alert()->success('Exam submited', 'Well, Your score is good!');

        return view('exam.result', [
            'course'    => $course,
            'exam'      => $exam,
            'doing'     => $doing,
        ]);
    }

}
