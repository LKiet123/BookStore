<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_book')->insert([
            'category_id' => '1',
            'book_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '2',
            'book_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '1',
            'book_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '7',
            'book_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '7',
            'book_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '3',
            'book_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '7',
            'book_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '4',
            'book_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '5',
            'book_id' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '6',
            'book_id' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '3',
            'book_id' => '6',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '7',
            'book_id' => '7',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '8',
            'book_id' => '7',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '7',
            'book_id' => '8',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '4',
            'book_id' => '8',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '9',
            'book_id' => '9',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '10',
            'book_id' => '9',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '12',
            'book_id' => '10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '13',
            'book_id' => '11',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '14',
            'book_id' => '12',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '4',
            'book_id' => '12',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '12',
            'book_id' => '13',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '13',
            'book_id' => '13',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '16',
            'book_id' => '14',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '13',
            'book_id' => '14',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '11',
            'book_id' => '15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '17',
            'book_id' => '15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '11',
            'book_id' => '16',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '16',
            'book_id' => '16',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '3',
            'book_id' => '17',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_book')->insert([
            'category_id' => '7',
            'book_id' => '17',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
