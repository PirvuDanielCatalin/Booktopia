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

    // User M - M Role ==> User 1 - M UserRole(FK)
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'users_roles', 'user_id', 'role_id');
    }

    // User 1 - 1 Profile(FK)
    public function profile()
    {
        return $this->hasOne('App\Models\Profile','user_id');
    }

    // User 1 - M BookComment(FK)
    public function bookcomments()
    {
        return $this->hasMany('App\Models\BookComment','user_id');
    }

    // User 1 - M Buy(FK)
    public function buys()
    {
        return $this->hasMany('App\Models\Buy','user_id');
    }

    // User 1 - M Rating(FK)
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating','user_id');
    }

    // User 1 - M Requirement(FK)
    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement','user_id');
    }

    public function isAdmin()
    {
        foreach ($this->roles as $role) {
            if ($role->name == 'Admin')
                return true;
        }
        return false;
    }

    public function isPartner()
    {
        foreach ($this->roles as $role) {
            if ($role->name == 'Partener')
                return true;
        }
        return false;
    }

    public function assignRole($role_name)
    {
        $new_role = Role::where('name', $role_name)->first();

        if ($new_role != null) {
            $roles = Role::all();

            foreach ($roles as $role)
                $this->roles()->detach($role);

            $this->roles()->attach($new_role);
        }
        return $this;
    }
}
