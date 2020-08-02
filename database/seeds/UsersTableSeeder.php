<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 2)->create();

        DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'is_admin' => 1,
                'email' => 'admin@astonbookstore.co.uk',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10)
            )
        );

        $books = App\Book::all();

        App\User::all()->each(function ($user) use ($books) { 
            $user->basket_items()->attach(
                $books->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });
    }
}
