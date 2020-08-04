<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id','book_id','quantity','unit_cost'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'book_id', 'id');
    }

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function price_subtotal()
    {
        $total = $this->unit_cost * $this->quantity;
        return number_format($total,  2);
    }
}
