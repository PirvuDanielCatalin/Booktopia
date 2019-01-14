<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Role M - M User ==> Role 1 - M UserRole(FK)
    public function users()
    {
        return $this->belongsToMany('App\Models\User','users_roles');
    }
}
