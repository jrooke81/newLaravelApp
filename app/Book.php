<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_title', 'stock_quantity', 'price', 'author', 'price', 'publication_year', 'book_cover_url'
    ];

    public function catagories()
    {
        return $this->belongsToMany('App\Catagory');
    }
}
