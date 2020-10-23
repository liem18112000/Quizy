<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function choices(){

        return $this->hasMany('App\Models\Choice','question_id',"question_id");
    }

    public function exam(){

        return $this->belongsTo('App\Models\Exam');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
