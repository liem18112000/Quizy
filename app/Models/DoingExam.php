<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoingExam extends Model
{

    public $table = "doing_exams";
    protected $guarded = [];
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\EnrollCourse');
    }

    public function choices(){
        return $this->hasMany('App\Models\ExamChoiceLog','user_id','user_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam');
    }

}
