<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ExamsImport implements ToCollection
{
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function collection(Collection $rows)
    {
        $curRow = 0;

        $exam = Exam::create([
            'title'         => $rows[$curRow][0],
            'course_id'     => $this->course ? $this->course->id : $rows[$curRow][1],
            'user_id'       => Auth::user()->id,
            'allow_time'    => $rows[$curRow][2],
            'duration_min'  => $rows[$curRow][3],
        ]);

        $numberOfQuestion = intval($rows[$curRow][4]);

        for($i = 0; $i < $numberOfQuestion; $i++) {

            $curRow++;

            $question = Question::create([
                'course_id'         => $exam->course_id,
                'exam_id'           => $exam->id,
                'description'       => $rows[$curRow][0],
                'answer_choice_id'  => $rows[$curRow][1]
            ]);

            $choices = null;

            for($j = 2; $j < 6; $j++) {

                $choices[] = Choice::create([
                    'question_id'       => $question->id,
                    'exam_id'           => $exam->id,
                    'description'       => $rows[$curRow][$j]
                ]);
            }

            $question->update([
                'answer_choice_id'  => $choices[$question->answer_choice_id - 1]->id
            ]);
        }
    }
}
