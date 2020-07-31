<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function details($id){
        return view('/book/bookdetails', array('book'=>Book::find($id)));
    }
}
