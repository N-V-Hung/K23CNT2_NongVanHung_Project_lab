<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NVH_LOAI_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::tabla('NVH_LOAI_SAN_PHAM')->insert([
            'nvhMaLoai' => "L001",
            'nvhTenLoai'=> "Cay canh van phong",
            'nvhTrangThai'=>0
        ]);
        DB::tabla('NVH_LOAI_SAN_PHAM')->insert([
            'nvhMaLoai' => "L002",
            'nvhTenLoai'=> "Cay de ban",
            'nvhTrangThai'=>0
        ]);
        DB::tabla('NVH_LOAI_SAN_PHAM')->insert([
            'nvhMaLoai' => "L003",
            'nvhTenLoai'=> "Cay canh phong thuy",
            'nvhTrangThai'=>0
        ]);
        DB::tabla('NVH_LOAI_SAN_PHAM')->insert([
            'nvhMaLoai' => "L004",
            'nvhTenLoai'=> "Cay thuy canh",
            'nvhTrangThai'=>0
        ]);
    }
}
