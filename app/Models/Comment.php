<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function books()
    {
        return $this->belongsToMany('App\Models\Book','books_comments');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User','books_comments');
    }

    public function bookcomments()
    {
        return $this->hasMany('App\Models\BookComment');
    }
}
