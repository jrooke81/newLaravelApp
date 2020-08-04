<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    protected $fillable = ['user_id','book_id','quantity'];

    public function book(){
        return $this->hasOne(Book::class,'id','book_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'id','user_id');
    }

    public function price_subtotal()
    {
        $subtotal = $this->book->price * $this->quantity;
        return number_format($subtotal,  2);
    }
}
