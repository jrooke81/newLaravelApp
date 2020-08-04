<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class StockController extends Controller
{
    public function manage_index()
    {
        return view('/stock/manage', ['books' => Book::all()]);
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

    public function add_index()
    {
        return view('/stock/add');
    }

    public function add_submit(Request $request)
    {
        if ($request->hasFile('book_cover')) {
            if ($request->file('book_cover')->isValid()) {
                $validator = Validator::make($request->all(), [
                    'book_title' => 'string',
                    'author' => 'string',
                    'publication_year' => ['integer', 'gt:0', 'lt:30000'],
                    'stock_quantity' => ['integer', 'gt:0', 'lt:10000'],
                    'price' => ['numeric', 'gt:0'],
                    'book_cover' => ['mimes:jpeg,png', 'size:100000'],
                ]);

                if ($validator->failed()) {
                    return back()->withErrors($validator);
                }
                $extension = $request->book_cover->extension();
                $book = Book::create([
                    'book_title' => $request->input('book_title'),
                    'author' => $request->input('author'),
                    'publication_year' => $request->input('publication_year'),
                    'stock_quantity' => $request->input('stock_quantity'),
                    'price' => $request->input('price')
                ]);

                if ($request->has('computing_checkbox')) {
                    $book->catagories()->attach($request->input('computing_checkbox'));
                }
                if ($request->has('business_checkbox')) {
                    $book->catagories()->attach($request->input('business_checkbox'));
                }
                if ($request->has('languages_checkbox')) {
                    $book->catagories()->attach($request->input('languages_checkbox'));
                }

                $request->book_cover->storeAs('/public/images', $book->id . "." . $extension);
                $url = Storage::url("images/" . $book->id . "." . $extension);
                $book->book_cover_url = $url;
                $book->save();
                Session::flash('success', "Book successfully added!");
                return back();
            }
        }
        abort(500, 'Failed to upload book cover image');
    }
}
