<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nvh_CT_HOA_DON extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'nvh_CT_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
       'nvhHoaDonID',   // Đảm bảo có trường nvhHoaDonID ở đây
        'nvhSanPhamID',
        'nvhSoLuongMua',
        'nvhDonGiaMua',
        'nvhThanhTien',
        'nvhTrangThai',
    ];

    // Quan hệ giữa bảng nv_CT_HOA_DON và bảng nv_SAN_PHAM
 // Quan hệ với bảng nv_HOA_DON
public function hoaDon()
{
    return $this->belongsTo(nvh_HOA_DON::class, 'nvHoaDonID', 'id');
}

// Quan hệ với bảng n_SAN_PHAM
public function sanPham()
{
    return $this->belongsTo(nvh_SAN_PHAM::class, 'nvSanPhamID', 'id');
}

}