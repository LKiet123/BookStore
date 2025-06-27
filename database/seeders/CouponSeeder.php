<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 50; $i++) {
            DB::table('coupons')->insert([
                'coupon_code' => 'COCODE' . $i,
                'discount_amount' => rand(5, 50) * 0.01, // Giảm giá ngẫu nhiên từ 5% đến 50%
                'valid_from' => now()->subDays(rand(0, 30)), // Ngày bắt đầu hiệu lực (ngẫu nhiên trong 30 ngày qua)
                'valid_to' => now()->addDays(rand(1, 30)), // Ngày hết hạn (ngẫu nhiên trong 30 ngày tới)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
