<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','books_categories');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Models\Comment','books_comments');
    }

    public function bookcomments()
    {
        return $this->hasMany('App\Models\BookComment');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }

    public function stock()
    {
        return $this->hasOne('App\Models\Stock');
    }

    public function buys()
    {
        return $this->hasMany('App\Models\Buy');
    }
}
