<?php

namespace App\Http\Controllers;

use App\BasketItem;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index($book_id){
        return view('/book/bookdetails', array('book'=>Book::find($book_id)));
    }
}
