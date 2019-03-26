<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $timestamps = false;

    protected $fillable = [

    ];

    // Invoice 1 - M Buy(FK)
    public function buys()
    {
        return $this->hasMany('App\Models\Buy');
    }
}
