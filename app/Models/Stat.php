<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'value'
    ];
}
