<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'first_name', 'last_name', 'phone', 'adress', 'photo', 'wishlist', 'user_id'
    ];

    // Profile(FK) 1 - 1 User
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
