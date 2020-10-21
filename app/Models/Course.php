<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function managedBy()
    {
        return $this->hasOne('App\Models\Role','user_id','admin_id');
    }

    public function teachBy(){
        return $this->hasMany('App\Models\Teaching','course_id','id');
    }

    public function hasStudent(){
        return $this->hasMany('App\Models\EnrollCourse','course_id','id');
    }

    
}
