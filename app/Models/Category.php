<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    // Category M - M Book ==> Category 1 - M BookCategory(FK)
    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'books_categories', 'category_id', 'book_id');
    }
}
