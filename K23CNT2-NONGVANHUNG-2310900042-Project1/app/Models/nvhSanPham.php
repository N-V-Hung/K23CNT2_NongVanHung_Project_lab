<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nvhSanPham extends Model
{
    use HasFactory;

    protected $table="nvh_san_pham";
    protected $fillable = [
        'nvhMaSanPham',
        'nvhTenSanPham',
        'nvhHinhAnh',
        'nvhSoLuong',
        'nvhDoiGia',
        'nvhMaLoai',
        'nvhTrangThai',
    ];
}
