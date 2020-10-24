<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function roleType()
    {
        return $this->belongsTo('App\Models\RoleType', 'role_type_id', 'id');
    }

    public function manageCourse(){
        return $this->hasMany('App\Models\Course','role_id');
    }

    public function teachCourse(){
        return $this->hasMany('App\Models\Teaching','user_id','user_id');
    }

    public function enrollCourse(){
        return $this->hasMany('App\Models\EnrollCourse','user_id','user_id');
    }

}
