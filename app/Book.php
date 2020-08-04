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

    public function order_item(){
        return $this->hasMany(OrderItem::class);
    }

    public function price_subtotal()
    {
        $subtotal = $this->price * $this->basket_items->quantity;
        return number_format($subtotal,  2);
    }
}
