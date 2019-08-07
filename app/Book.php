<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

    //many-to-many on tbl borrows
    public function borrow()
    {
        return $this->belongsToMany('App\Borrow');
    }
}

