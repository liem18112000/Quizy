<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollCourse extends Model

{
    public $table = "enrollcourses";
    protected $guarded = [];
    use HasFactory;


    public function enrollBy()
    {
        return $this->belongsTo('App\Models\Role','user_id','user_id');
    }

    public function forCourse()
    {
        return $this->belongsTo('App\Models\Course','course_id');
    }

    public function exams(){
        return $this->hasMany('App\Models\DoingExam','user_id','user_id');
    }



}
