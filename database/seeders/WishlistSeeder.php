<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wishlists')->insert([
            'user_id' => 1,
            'book_id' => 2,
        ]);

        DB::table('wishlists')->insert([
            'user_id' => 1,
            'book_id' => 3,
        ]);

        DB::table('wishlists')->insert([
            'user_id' => 1,
            'book_id' => 4,
        ]);

        DB::table('wishlists')->insert([
            'user_id' => 1,
            'book_id' => 5,
        ]);

        DB::table('wishlists')->insert([
            'user_id' => 1,
            'book_id' => 6,
        ]);

        DB::table('wishlists')->insert([
            'user_id' => 1,
            'book_id' => 7,
        ]);
    }
}
