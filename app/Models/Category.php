<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function books()
    {
        return $this->belongsToMany('App\Models\Book','books_categories');
    }
}
