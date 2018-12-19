<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
}
