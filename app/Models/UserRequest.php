<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function requestType()
    {
        return $this->belongsTo('App\Models\UserRequestType');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function verifiedBy()
    {
        return $this->belongsTo('App\Models\User', 'admin_id', 'id');
    }
}
