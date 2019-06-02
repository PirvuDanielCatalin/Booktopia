<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'book_id';
    public $timestamps = false;

    protected $fillable = [
        'title', 'author', 'publishing_house', 'description', 'photo', 'price', 'inShop'
    ];

    //region Many To Many
    // Book M - M Category ==> Book 1 - M BookCategory(FK)
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'books_categories', 'book_id', 'category_id');
    }
    //endregion

    //region One To Many
    // Book 1 - M BookComment(FK)
    public function bookcomments()
    {
        return $this->hasMany('App\Models\BookComment', 'book_id');
    }

    // Book 1 - M Rating(FK)
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating', 'book_id');
    }

    // Book 1 - M Requirement(FK)
    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement', 'book_id');
    }

    // Book 1 - M Buy(FK)
    public function buys()
    {
        return $this->hasMany('App\Models\Buy', 'book_id');
    }
    //endregion

    //region One To One
    // Book 1 - 1 Stock(FK)
    public function stock()
    {
        return $this->hasOne('App\Models\Stock', 'book_id');
    }

    // Book 1 - 1 Offer(FK)
    public function offer()
    {
        return $this->hasOne('App\Models\Offer', 'book_id');
    }
    //endregion
}
