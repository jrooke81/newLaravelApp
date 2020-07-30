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
        DB::table('books')->insert(
            array(
                'book_name' => 'My Test Book',
                'price' => 5.67,
                'author' => 'Will Smith',
                'publication_year' => '2020',
                'cover_image' => 'amber.jpg'
            )
        );
    }
}
