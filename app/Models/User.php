<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','users_roles');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Models\Comment','books_comments');
    }

    public function bookcomments()
    {
        return $this->hasMany('App\Models\BookComment');
    }

    public function buys()
    {
        return $this->hasMany('App\Models\Buy');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }

    public function isAdmin()
    {
        foreach ($this->roles as $role){
            if($role->name == 'Admin')
                return true;
        }
        return false;
    }
}
