<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $guarded = ['id'];

    // one-to-many on tbl students
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    //many-to-many on tbl books
    public function book()
    {
        return $this->belongsToMany('App\Book');
    }
}
