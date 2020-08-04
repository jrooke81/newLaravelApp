<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function order_confirmed($user_id)
    {
        $order = Order::create([
                'user_id' => $user_id,
                'status_code' => 'placed'
            ]);

        $user = User::find($user_id);

        foreach($user->basket_items as $basket_item){
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $basket_item->book_id,
                'quantity' => $basket_item->quantity,
                'unit_cost' => $basket_item->book->price
            ]);

            $basket_item->delete();
        }

        return view('/basket/confirmed', ['order_id' => $order->id]);
    }

    public function overview()
    {
        return view('order/orders_overview',['orders'=>Order::all()]);
    }

    public function details($order_id)
    {
        return view('order/order_details',['order'=>Order::find($order_id)]);
    }
}
