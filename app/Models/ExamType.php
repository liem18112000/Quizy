<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exams()
    {
        return $this->hasMany('App\Models\Exam');
    }
}