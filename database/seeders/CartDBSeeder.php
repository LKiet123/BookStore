<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class CartDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('cart_d_b')->insert([
            'user_id' => 1,
            'book_id' => 1,
            'quantity' => 5,
        ]);
       DB::table('cart_d_b')->insert([
            'user_id' => 2,
            'book_id' => 2,
            'quantity' => 5,
        ]);
       DB::table('cart_d_b')->insert([
            'user_id' => 3,
            'book_id' => 3,
            'quantity' => 5,
        ]);
         DB::table('cart_d_b')->insert([
            'user_id' => 4,
            'book_id' => 4,
            'quantity' => 5,
        ]);
        DB::table('cart_d_b')->insert([
            'user_id' => 5,
            'book_id' => 5, 
            'quantity' => 5,
        ]);
        DB::table('cart_d_b')->insert([
            'user_id' => 6,
            'book_id' => 6,
            'quantity' => 5,
        ]);
       DB::table('cart_d_b')->insert([
            'user_id' => 7,
            'book_id' => 7,
            'quantity' => 5,
        ]);
         DB::table('cart_d_b')->insert([
            'user_id' => 8,
            'book_id' => 8,
            'quantity' => 5,
        ]);
       DB::table('cart_d_b')->insert([
            'user_id' => 9,
            'book_id' => 9,
            'quantity' => 5,
        ]);
        DB::table('cart_d_b')->insert([
            'user_id' => 10,
            'book_id' => 10,
            'quantity' => 5,
        ]);
         DB::table('cart_d_b')->insert([
            'user_id' => 11,
            'book_id' => 11,
            'quantity' => 5,
        ]);
         DB::table('cart_d_b')->insert([
            'user_id' => 12,
            'book_id' => 12,
        ]);
         DB::table('cart_d_b')->insert([
            'user_id' => 13,
            'book_id' => 13,
            'quantity' => 5,
        ]);
         DB::table('cart_d_b')->insert([
            'user_id' => 14,
            'book_id' => 14,
            'quantity' => 5,
        ]);
         DB::table('cart_d_b')->insert([
            'user_id' => 15,
            'book_id' => 15,
            'quantity' => 5,
        ]);
         DB::table('cart_d_b')->insert([
            'user_id' => 16,
            'book_id' => 16,
            'quantity' => 5,
        ]);
         DB::table('cart_d_b')->insert([
            'user_id' => 17,
            'book_id' => 17,
            'quantity' => 5,
        ]);
    }
      
}
