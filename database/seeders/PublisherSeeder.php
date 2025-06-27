<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('publishers')->insert([
                'publisher_name' => 'Kim Đồng' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => "số 55 phố Quang Trung, quận Hai Bà Trưng, thành phố Hà Nội" , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('publishers')->insert([
                'publisher_name' => 'Hội Nhà Văn' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => '65 Nguyễn Du, quận Hai Bà Trưng, Hà Nộ' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'Văn Học' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => '18 phố Nguyễn Trường Tộ, quận Ba Đình, thành phố Hà Nội' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'First News' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => '11H Nguyễn Thị Minh Khai, Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'NXB Trẻ' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => '161B Lý Chính Thắng, Phường Võ Thị Sáu, Quận 3, Hồ Chí Minh' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'Phụ Nữ' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => '16 Alexandre de Rhodes, Bến Nghé, Quận 1, Hồ Chí Minh' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'NXB Thế Giới' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => '7 Đ. Nguyễn Thị Minh Khai, Bến Nghé, Quận 1, Hồ Chí Minh' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'Lao Động - Xã Hội' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => '36 Ng. Hòa Bình 4, Phố, Hai Bà Trưng, Hà Nội' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            for( $i = 1; $i <= 10; $i++) {
                DB::table('publishers')->insert([
                    'publisher_name' => 'Publisher ' . $i,
                    'contact_info' => Str::random(10) . '@example.com',
                    'address' => 'Address ' . $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            
    }
}
