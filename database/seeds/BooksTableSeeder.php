<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Book::class, 10)->create();

        $catagories = App\Catagory::all();

        App\Book::all()->each(function ($book) use ($catagories) { 
            $book->catagories()->attach(
                $catagories->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });
    }
}
