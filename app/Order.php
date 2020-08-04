<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','order_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

    public function cost(){
        $total = 0;
        foreach($this->order_items as $order_item){
            $total += $order_item->unit_cost * $order_item->quantity;
        }
        return number_format($total,  2);
    }

    public function book_count()
    {
        return $this->order_items->count();
    }

    public function status(){
        return $this->order_status;
    }
}
