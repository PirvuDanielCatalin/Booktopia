<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'book_id', 'value'
    ];

    // Rating(FK) M - 1 User
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Rating(FK) M - 1 Book
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
}
