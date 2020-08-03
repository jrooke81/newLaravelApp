<?php

namespace App\Http\Controllers;

use App\BasketItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use App\User;
use App\Book;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{

    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/basket', array('user'=>Auth::user()));
    }

    public function alter_quantity($basket_item_id, Request $request){
        $basket_item = BasketItem::find($basket_item_id);
        $book = Book::find($basket_item->book_id);
        $requested_quantity = $request->input('quantity');
        //Check enough books are in stock for requested quantity
        if($book->stock_quantity >= $requested_quantity){
            $basket_item->quantity = $request->input('quantity');
            $basket_item->save();
        }
        else{
            Session::flash('message', "Not enough of that book in stock");
        }
        return back();
    }

    public function remove_book($basket_item_id, Request $request){
        $basket_item = BasketItem::find($basket_item_id);
        $basket_item->delete();
        return back();
    }

    public function add_to_basket($book_id, Request $request){
        $user_id = $this->auth->user()->id;
        $basket_items = User::find($user_id)->basket_items();
        $existing_basket_item = $basket_items->where('book_id','=',$book_id)->first();
        if($existing_basket_item === null){
            $basket_items->attach($book_id, ['quantity'=>$request->input('quantity')]);
        }
        else{
            $updated_basket_item = BasketItem::find($existing_basket_item->basket_items->id);
            $updated_basket_item->quantity +=  $request->input('quantity');
            if($updated_basket_item->quantity <= Book::find($book_id)->stock_quantity){
                $updated_basket_item->save();
            }
            else{
                Session::flash('message', "Not enough of that book left in stock. Please check your basket.");
            }
        }
        return back();
    }
}
