<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookComment extends Model
{
    protected $primaryKey = 'book_comment_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'book_id', 'approvals', 'text', 'date'
    ];

    protected $table = 'books_comments';

    // BookComment(FK) M - 1 User
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    // BookComment(FK) M - 1 Book
    public function book()
    {
        return $this->belongsTo('App\Models\Book','book_id');
    }
}
