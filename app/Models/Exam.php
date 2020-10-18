<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Input\StringInput;

class Exam extends Model
{
    public $table = "exams";
    protected $guarded = [];
    use HasFactory;

    public function createBy(){

        return $this->belongsTo('App\Models\Teaching','user_id','user_id');
    }

    public function questions(){
        return $this->hasMany('App\Models\Question',"exam_id",'id');
    }
}
