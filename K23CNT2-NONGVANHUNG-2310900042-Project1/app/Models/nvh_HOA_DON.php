<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nvh_HOA_DON extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'nvh_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'nvhMaHoaDon',  // Thêm trường nvhMaHoaDon vào mảng fillable
        'nvhMaKhachHang',
        'nvhNgayHoaDon',
        'nvhNgayNhan',
        'nvhHoTenKhachHang',
        'nvhEmail',
        'nvhDienThoai',
        'nvhDiaChi',
        'nvhTongGiaTri',
        'nvhTrangThai',
    ];

    // Quan hệ với bảng nvh_KHACH_HANG
    public function khachHang()
    {
        return $this->belongsTo(nvh_KHACH_HANG::class, 'nvhMaKhachHang', 'id');
    }

    // Quan hệ với bảng nvh_CT_HOA_DON
    public function chiTietHoaDon()
    {
        return $this->hasMany(nvh_CT_HOA_DON::class, 'nvhHoaDonID', 'id');
    }
    
}