<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class IndexController extends Controller
{
    public function getBooks(){
        return view('/books/index', array('books'=>Book::all()));
    }
}
