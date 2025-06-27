<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class RepoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('repos')->insert([
           
            'warehouseLocation' => '248 Cống Quỳnh, Quận 1, TP.HCM',
           
        ]);
        DB::table('repos')->insert([
           
            'warehouseLocation' => '03 Nguyễn Oanh, phường 10, Quận Gò Vấp, TPHCM',
           
        ]);
        DB::table('repos')->insert([
          
            'warehouseLocation' => '223 Nguyễn Thị Minh Khai, Hồ Chí Minh',
            
        ]);
         DB::table('repos')->insert([
        
            'warehouseLocation' => 'số 86A Nguyễn Thái Sơn, Quận Gò Vấp, TP.HCM',
         
        ]);
         DB::table('repos')->insert([
           
            'warehouseLocation' => 'Chi nhánh Nguyễn Đình Chiểu, Phường 6, Quận 3, TP.HCM',
          
        ]);
         DB::table('repos')->insert([
            
            'warehouseLocation' => 'Chi nhánh Nguyễn Đình Chiểu, Phường 5, Quận 3, TP.HCM',
            
        ]);
         DB::table('repos')->insert([
           
            'warehouseLocation' => '387 – 389 Hai Bà Trưng, Phường 8, Quận 3, TP.HCM',
            
        ]);
         DB::table('repos')->insert([
          
            'warehouseLocation' => 'số 15, lô B, chung cư 43, Hồ Văn Huê, phường 9, Phú Nhuận, thành phố Hồ Chí Minh',
           
        ]);
         DB::table('repos')->insert([
           
            'warehouseLocation' => '175/24 Phạm Ngũ Lão, Quận 1, TPHCM',
            
        ]);
         DB::table('repos')->insert([
           
            'warehouseLocation' => '160 Trần Huy Liệu, p15, quận Phú Nhuận, Tp.HCM',
            
        ]);
           DB::table('repos')->insert([
           
            'warehouseLocation' => '60-62 Lê Lợi – Phường Bến Nghé – Quận 1 – TP. Hồ Chí Minh',
           
        ]);
    }
      
}
