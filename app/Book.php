<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_title', 'stock_quantity', 'price', 'author', 'price', 'publication_year', 'book_cover_url'
    ];

    public function basket_items(){
        return $this->hasMany(BasketItem::class);
    }

    public function catagories()
    {
        return $this->belongsToMany('App\Catagory');
    }

    public function order_item(){
        return $this->hasMany(OrderItem::class);
    }
}
