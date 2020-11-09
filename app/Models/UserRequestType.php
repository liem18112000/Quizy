<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequestType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function requests()
    {
        return $this->hasMany('App\Models\UserRequest');
    }
}
