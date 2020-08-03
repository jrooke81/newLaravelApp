<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    public function manage_index(){
        return view('/stock/manage', ['books'=>Book::all()]);
    }

    public function alter_stock_quantity($book_id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'stock_quantity' => ['required','integer','gt:0','lt:32767']
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator);
        }

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

    public function add_index()
    {
        return view('/stock/add');
    }
}
