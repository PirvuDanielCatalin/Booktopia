<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $primaryKey = 'stat_id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'value'
    ];
}
