<?php

namespace App\Http\Controllers;

use App\BasketItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Guard;
use App\User;

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
        $basket_item->quantity = $request->input('quantity');
        $basket_item->save();
        return redirect('/basket');
    }

    public function remove_book($basket_item_id, Request $request){
        $basket_item = BasketItem::find($basket_item_id);
        $basket_item->delete();
        return redirect('/basket');
    }

    public function add_to_basket($book_id, Request $request){
        $user_id = $this->auth->user()->id;
        User::find($user_id)->basket_items()->attach($book_id, ['quantity'=>$request->input('quantity')]);
        return redirect('/book/'.$book_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
