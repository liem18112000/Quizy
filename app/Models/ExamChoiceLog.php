<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamChoiceLog extends Model
{
    public $table = "exam_choice_log";
    protected $guarded = [];
    use HasFactory;

    public function choices(){
        return $this->belongsTo('App\Models\DoingExam','user_id','user_id');
    }
    
}
