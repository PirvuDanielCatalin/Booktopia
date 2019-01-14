<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    // Stock(FK) 1 - 1 Book
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
}
