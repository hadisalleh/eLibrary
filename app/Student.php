<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['id'];

    // one-to-one on tbl users
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // one-to-many on tbl courses
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    // one-to-many on tbl borrows
    public function borrow()
    {
        return $this->hasMany('App\Borrow');
    }
}
