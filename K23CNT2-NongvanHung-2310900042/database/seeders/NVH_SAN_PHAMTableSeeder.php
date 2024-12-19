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
        DB::table("NVH_SAN_PHAM")->insert([
            'nvhMaSanPham'     =>"VP001",
            'nvhTenSanPham'    =>"cay phu quy",
            'nvhHinhAnh'       =>"images/san-pham/VP001.jpg",
            'nvhSoLuong'       =>100,
            'nvhDonGia'       =>699000,
            'nvhMaLoai'       =>1,
            'nvhTrangThai'       =>0
        ]);
        DB::table("NVH_SAN_PHAM")->insert([
            'nvhMaSanPham'     =>"VP002",
            'nvhTenSanPham'    =>"cay dai phu quy",
            'nvhHinhAnh'       =>"images/san-pham/VP002.jpg",
            'nvhSoLuong'       =>200,
            'nvhDonGia'       =>50000,
            'nvhMaLoai'       =>1,
            'nvhTrangThai'       =>0
        ]);
        DB::table("NVH_SAN_PHAM")->insert([
            'nvhMaSanPham'     =>"VP003",
            'nvhTenSanPham'    =>"cay hanh phuc",
            'nvhHinhAnh'       =>"images/san-pham/VP003.jpg",
            'nvhSoLuong'       =>150,
            'nvhDonGia'       =>150000,
            'nvhMaLoai'       =>1,
            'nvhTrangThai'       =>0
        ]);
        DB::table("NVH_SAN_PHAM")->insert([
            'nvhMaSanPham'     =>"VP004",
            'nvhTenSanPham'    =>"cay van loc",
            'nvhHinhAnh'       =>"images/san-pham/VP004.jpg",
            'nvhSoLuong'       =>300,
            'nvhDonGia'       =>799000,
            'nvhMaLoai'       =>1,
            'nvhTrangThai'       =>0
        ]);
        DB::table("NVH_SAN_PHAM")->insert([
            'nvhMaSanPham'     =>"PT001",
            'nvhTenSanPham'    =>"cay thiet moc lan",
            'nvhHinhAnh'       =>"images/san-pham/VP001.jpg",
            'nvhSoLuong'       =>150,
            'nvhDonGia'       =>590000,
            'nvhMaLoai'       =>1,
            'nvhTrangThai'       =>0
        ]);
        DB::table("NVH_SAN_PHAM")->insert([
            'nvhMaSanPham'     =>"PT002",
            'nvhTenSanPham'    =>"cay truong sinh",
            'nvhHinhAnh'       =>"images/san-pham/VP002.jpg",
            'nvhSoLuong'       =>100,
            'nvhDonGia'       =>150000,
            'nvhMaLoai'       =>1,
            'nvhTrangThai'       =>0
        ]);
        DB::table("NVH_SAN_PHAM")->insert([
            'nvhMaSanPham'     =>"PT003",
            'nvhTenSanPham'    =>"cay hanh phuc",
            'nvhHinhAnh'       =>"images/san-pham/PT003.jpg",
            'nvhSoLuong'       =>300,
            'nvhDonGia'       =>299000,
            'nvhMaLoai'       =>1,
            'nvhTrangThai'       =>0
        ]);
        DB::table("NVH_SAN_PHAM")->insert([
            'nvhMaSanPham'     =>"PT004",
            'nvhTenSanPham'    =>"cay hoa nhai",
            'nvhHinhAnh'       =>"images/san-pham/PT004.jpg",
            'nvhSoLuong'       =>3000,
            'nvhDonGia'       =>199000,
            'nvhMaLoai'       =>1,
            'nvhTrangThai'       =>0
        ]);
        
    }
}
