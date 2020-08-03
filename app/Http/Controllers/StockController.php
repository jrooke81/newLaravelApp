<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class StockController extends Controller
{
    public function index(){
        return view('/stock/stock', ['books'=>Book::all()]);
    }

    public function alter_stock_quantity($book_id, Request $request)
    {
        $book = Book::find($book_id);
        $book->stock_quantity = $request->input('stock_quantity');
        $book->save();
        return back();
    }

    public function remove_from_stock($book_id)
    {
        $book = Book::find($book_id);
        $book->delete();
        return back();
    }
}
