<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaching extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function teachBy()
    {
        return $this->belongsTo('App\Models\Role','user_id','user_id');
    }

    public function forCourse()
    {
        return $this->belongsTo('App\Models\Course','course_id');
    }

    public function createExam(){
        return $this->hasMany('App\Models\Exam','user_id','user_id');
    }

}

