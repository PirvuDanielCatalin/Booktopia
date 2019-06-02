<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $primaryKey = 'stock_id';
    public $timestamps = false;

    protected $fillable = [
        'book_id', 'amount'
    ];

    // Stock(FK) 1 - 1 Book
    public function book()
    {
        return $this->belongsTo('App\Models\Book','book_id');
    }
}
