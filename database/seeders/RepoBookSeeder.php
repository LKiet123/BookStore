<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class RepoBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('repo_books')->insert([
            'book_id' => 1,
            'warehouse_id' => 1,
            'quantity' => 0,
        ]);
       DB::table('repo_books')->insert([
            'book_id' => 2,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
       DB::table('repo_books')->insert([
            'book_id' => 3,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
         DB::table('repo_books')->insert([
            'book_id' => 4,
            'warehouse_id' => 1,
            'quantity' => 0,
        ]);
        DB::table('repo_books')->insert([
            'book_id' => 5,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
        DB::table('repo_books')->insert([
            'book_id' => 6,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
       DB::table('repo_books')->insert([
            'book_id' => 7,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
         DB::table('repo_books')->insert([
            'book_id' => 8,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
       DB::table('repo_books')->insert([
            'book_id' => 9,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
        DB::table('repo_books')->insert([
            'book_id' => 10,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
         DB::table('repo_books')->insert([
            'book_id' => 11,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
         DB::table('repo_books')->insert([
            'book_id' => 12,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
         DB::table('repo_books')->insert([
            'book_id' => 13,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
         DB::table('repo_books')->insert([
            'book_id' => 14,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
         DB::table('repo_books')->insert([
            'book_id' => 15,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
         DB::table('repo_books')->insert([
            'book_id' => 16,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
         DB::table('repo_books')->insert([
            'book_id' => 17,
            'warehouse_id' => 1,
            'quantity' => rand(10, 100),
        ]);
    }
      
}
