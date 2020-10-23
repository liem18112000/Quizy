<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course, Exam $exam)
    {
        return view('question.index', [
            'questions' => Question::where('course_id', $course->id)->where('exam_id', $exam->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course, Exam $exam)
    {
        return view('question.create', [
            'course' => $course,
            'exam' => $exam
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course, Exam $exam)
    {
        $question = Question::create([
            'description'   => $request->description,
            'exam_id'       => $exam->id,
            'course_id'     => $course->id,
        ]);

        alert()->success('Create Question Successfully');

        activity()
            ->performedOn($question)
            ->causedBy(Auth::user())
            ->log('New question create');

        return redirect()->route('question.show', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Exam $exam, Question $question)
    {
        return view('question.edit', [
            'course' => $course,
            'exam' => $exam
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Course $course, Exam $exam, Question $question)
    {
        $question->update([
            'description'   => $request->description,
            'exam_id'       => $exam->id,
            'course_id'     => $course->id,
        ]);

        alert()->success('Update Question Successfully');

        activity()
            ->performedOn($question)
            ->causedBy(Auth::user())
            ->log('Question update');

        return redirect()->route('question.index', [$course, $exam]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
