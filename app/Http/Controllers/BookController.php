<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index(){
        return view('/book/index', array('books'=>Book::all()));
    }
}
