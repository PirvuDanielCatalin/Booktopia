<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Category M - M Book ==> Category 1 - M BookCategory(FK)
    public function books()
    {
        return $this->belongsToMany('App\Models\Book','books_categories');
    }
}
