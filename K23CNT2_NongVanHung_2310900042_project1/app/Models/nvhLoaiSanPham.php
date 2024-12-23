<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nvhLoaiSanPham extends Model
{
    use HasFactory;

    protected $table="nvh_loai_san_pham";
    protected $fillable = [
        'nvhMaLoai',
        'nvhTenLoai',
        'nvhTrangThai',
    ];
}
