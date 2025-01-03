<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NVH_QUAN_TRITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $nvhMatKhau = md5('123456a@');
        DB::table('NVH_QUAN_TRI')->insert([
            'nvhTaiKhoan'=>"nongvanhung@gmail.com",
            'nvhMatKhau'=> $nvhMatKhau,
            'nvhTrangThai'=>0
        ]);
        DB::table('NVH_QUAN_TRI')->insert([
            'nvhTaiKhoan'=>"0123456789",
            'nvhMatKhau'=> $nvhMatKhau,
            'nvhTrangThai'=>0
        ]);
    }
}
