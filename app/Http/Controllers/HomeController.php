<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Catagory;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('/home', ['books'=>Book::all(),'catagories'=>Catagory::all()]);
    }

    public function catagory($catagory_name){
        $catagory = Catagory::where('catagory_name',$catagory_name)->first();
        $books_in_catagory = $catagory->books;
        return view('/home', ['books'=>$books_in_catagory,'catagories'=>Catagory::all()]);
    }
}
