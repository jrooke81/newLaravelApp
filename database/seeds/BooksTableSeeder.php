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
        $faker = Faker\Factory::create();

        for($i=0;$i<9;$i++){
            DB::table('books')->insert(
                array(
                    'book_name' => $faker->catchPhrase(),
                    'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 30),
                    'author' => $faker->name(),
                    'publication_year' => $faker->year(2020),
                    'cover_image' => $faker->imageUrl($width = 265, $height = 400) 
                    )
                );
        }

    }
}
