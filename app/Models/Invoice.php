<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function buys()
    {
        return $this->hasMany('App\Models\Buy');
    }
}
