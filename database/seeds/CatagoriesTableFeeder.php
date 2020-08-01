<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatagoriesTableFeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catagories')->insert(
            array(
                'catagory_name' => 'Computing',
            )
        );
        DB::table('catagories')->insert(
            array(
                'catagory_name' => 'Business'
            )
        );
        DB::table('catagories')->insert(
            array(
                'catagory_name' => 'Languages'
            )
        );
    }
}
