<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Thêm dòng này
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class nvh_KHACH_HANG extends Authenticatable // Kế thừa từ Authenticatable
{
    use HasFactory;


    protected $table = 'nvh_KHACH_HANG';
    protected $primaryKey = 'nvhMaKhachHang'; // Đảm bảo rằng nvhMaKhachHang là khóa chính

    protected $fillable = [
        'nvhMaKhachHang', 
        'nvhHoTenKhachHang', 
        'nvhEmail',  
        'nvhDiaChi', 
        'nvhNgayDangKy', 
        'nvhTrangThai'
    ];

    public $incrementing = false; // Nếu nvhMaKhachHang không tự tăng thì bạn cần đặt false
    public $timestamps = true;

    protected $dates = ['nvhNgayDangKy'];

    public function setnvhMatKhauAttribute($value)
{
    if (!empty($value)) {
        $this->attributes['nvhMatKhau'] = Hash::make($value);
    }
}

    
}