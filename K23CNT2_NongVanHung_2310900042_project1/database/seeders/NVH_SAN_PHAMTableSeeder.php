<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NVH_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('NVH_SAN_PHAM')->insert([
            'nvhMaSanPham' => "VP001",
            'nvhTenSanPham'=> "Cay phu quy",
            'nvhHinhAnh'=>"images/san-pham/VP001",            
            'nvhSoLuong'=>100,            
            'nvhDonGia'=>699000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
        DB::table('NVH_SAN_PHAM')->insert([
            'nvhMaSanPham' => "VP002",
            'nvhTenSanPham'=> "Cay dai phu gia",
            'nvhHinhAnh'=>"images/san-pham/VP002",            
            'nvhSoLuong'=>200,            
            'nvhDonGia'=>550000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
        DB::table('NVH_SAN_PHAM')->insert([
            'nvhMaSanPham' => "VP003",
            'nvhTenSanPham'=> "Cay hanh phuc",
            'nvhHinhAnh'=>"images/san-pham/VP003",            
            'nvhSoLuong'=>150,            
            'nvhDonGia'=>250000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
        DB::table('NVH_SAN_PHAM')->insert([
            'nvhMaSanPham' => "VP004",
            'nvhTenSanPham'=> "Cay van loc",
            'nvhHinhAnh'=>"images/san-pham/VP004",            
            'nvhSoLuong'=>300,            
            'nvhDonGia'=>799000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
        DB::table('NVH_SAN_PHAM')->insert([
            'nvhMaSanPham' => "PT001",
            'nvhTenSanPham'=> "Cay thiet moc lan",
            'nvhHinhAnh'=>"images/san-pham/PT001",            
            'nvhSoLuong'=>150,            
            'nvhDonGia'=>590000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
        DB::table('NVH_SAN_PHAM')->insert([
            'nvhMaSanPham' => "PT002",
            'nvhTenSanPham'=> "Cay truong sinh",
            'nvhHinhAnh'=>"images/san-pham/PT002",            
            'nvhSoLuong'=>100,            
            'nvhDonGia'=>150000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
        DB::table('NVH_SAN_PHAM')->insert([
            'nvhMaSanPham' => "PT003",
            'nvhTenSanPham'=> "Cay hanh phuc",
            'nvhHinhAnh'=>"images/san-pham/PT003",            
            'nvhSoLuong'=>200,            
            'nvhDonGia'=>299000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
        DB::table('NVH_SAN_PHAM')->insert([
            'nvhMaSanPham' => "PT004",
            'nvhTenSanPham'=> "Cay hoa nhai (lai ta)",
            'nvhHinhAnh'=>"images/san-pham/PT004",            
            'nvhSoLuong'=>300,            
            'nvhDonGia'=>199000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
    }
}
