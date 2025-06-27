<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('orders_detail')->insert([
                'order_id' => $i, 
                'book_id' => rand(1, 15), 
                'quantity' => rand(1, 5), 
                'price' => rand(10000, 1000000), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
