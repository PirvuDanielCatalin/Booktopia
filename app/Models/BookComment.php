<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookComment extends Model
{
    protected $table = 'books_comments';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comment()
    {
        return $this->belongsTo('App\Models\Comment');
    }

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

}
