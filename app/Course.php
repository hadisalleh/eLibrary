<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id'];

    // one-to-many on tbl students
    public function student()
    {
        return $this->hasMany('App\Student');
    }
}
