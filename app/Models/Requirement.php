<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $primaryKey = 'requirement_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'book_id', 'increment', 'status'
    ];

    // Requirement(FK) M - 1 User
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    // Requirement(FK) M - 1 Book
    public function book()
    {
        return $this->belongsTo('App\Models\Book','book_id');
    }
}
