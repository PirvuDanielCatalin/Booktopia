<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $primaryKey = 'buy_id';
    public $timestamps = false;

    // Buy(FK) M - 1 User
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Buy(FK) M - 1 Book
    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id');
    }

    // Buy(FK) M - 1 Invoice
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice', 'invoice_id');
    }
}
