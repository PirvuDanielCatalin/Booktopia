<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    // Buy(FK) M - 1 User
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Buy(FK) M - 1 Book
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

    // Buy(FK) M - 1 Invoice
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}
