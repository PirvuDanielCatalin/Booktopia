<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookComment extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'approvals', 'text', 'date'
    ];

    protected $table = 'books_comments';

    // BookComment(FK) M - 1 User
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // BookComment(FK) M - 1 Book
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
}
