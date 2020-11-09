<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CourseImport

implements ToCollection
{
    public function collection(Collection $rows)
    {
        $curRow = 0;

        $course = Course::create([
            'name'          => $rows[$curRow][0],
            'image'         => $rows[$curRow][1],
            'admin_id'      => Auth::user()->id,
            'role_id'       => Auth::user()->roles->where('role_type_id', '3')->first()->id,
        ]);

        $numberOfExam = intval($rows[$curRow][2]);

        for ($k = 0; $k < $numberOfExam; $k++) {

            $curRow++;

            $exam = Exam::create([
                'title'         => $rows[$curRow][0],
                'course_id'     => $course->id,
                'user_id'       => Auth::user()->id,
                'allow_time'    => $rows[$curRow][1],
                'duration_min'  => $rows[$curRow][2],
            ]);

            $numberOfQuestion = intval($rows[$curRow][3]);

            for ($i = 0; $i < $numberOfQuestion; $i++) {

                $curRow++;

                $question = Question::create([
                    'course_id'         => $exam->course_id,
                    'exam_id'           => $exam->id,
                    'description'       => $rows[$curRow][0],
                    'answer_choice_id'  => $rows[$curRow][1]
                ]);

                $choices = null;

                for ($j = 2; $j < 6; $j++) {

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
}
