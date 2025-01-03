<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nvh_HOA_DON; 
use App\Models\nvh_KHACH_HANG; 
use App\Models\nvh_SAN_PHAM; 

class nvh_HOA_DONController extends Controller
{
    // Hiển thị chi tiết hóa đơn và sản phẩm
    public function show($hoaDonId, $sanPhamId)
    {
        // Lấy hóa đơn và sản phẩm từ ID
        $hoaDon = nvh_HOA_DON::findOrFail($hoaDonId);
        $sanPham = nvh_SAN_PHAM::findOrFail($sanPhamId);

        // Trả về view để hiển thị thông tin hóa đơn và sản phẩm
        return view('nvhuser.hoadonshow', compact('hoaDon', 'sanPham'));
    }

    // List hóa đơn - Admin CRUD
    public function nvhList()
    {
        // Lấy tất cả hóa đơn
        $nvhhoadons = nvh_HOA_DON::all();
        return view('nvhAdmin.nvhhoadon.nvh-list', ['nvhhoadons' => $nvhhoadons]);
    }

    // Hiển thị chi tiết hóa đơn - Admin CRUD
    public function nvhDetail($id)
    {
        // Tìm hóa đơn theo ID
        $nvhhoadon = nvh_HOA_DON::findOrFail($id);

        // Trả về view và truyền thông tin hóa đơn
        return view('nvhAdmin.nvhhoadon.nvh-show', ['nvhhoadon' => $nvhhoadon]);
    }

    // Tạo mới hóa đơn - Admin CRUD
    public function nvhCreate()
    {
        // Lấy tất cả khách hàng
        $nvhkhachhang = nvh_KHACH_HANG::all();
        return view('nvhAdmin.nvhhoadon.nvh-create', ['nvhkhachhang' => $nvhkhachhang]);
    }

    // Xử lý khi gửi form tạo mới hóa đơn
    public function nvhCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu
        $validated = $request->validate([
            'nvhMaHoaDon' => 'required|unique:nvh_hoa_don,nvhMaHoaDon',
            'nvhMaKhachHang' => 'required|exists:nvh_khach_hang,id',
            'nvhNgayHoaDon' => 'required|date',
            'nvhNgayNhan' => 'required|date',
            'nvhHoTenKhachHang' => 'required|string',
            'nvhEmail' => 'required|email',
            'nvhDienThoai' => 'required|numeric',
            'nvhDiaChi' => 'required|string',
            'nvhTongGiaTri' => 'required|numeric',
            'nvhTrangThai' => 'required|in:0,1,2',
        ]);

        // Tạo mới hóa đơn
        $nvhhoadon = new nvh_HOA_DON;
        $nvhhoadon->nvhMaHoaDon = $request->nvhMaHoaDon;
        $nvhhoadon->nvhMaKhachHang = $request->nvhMaKhachHang;
        $nvhhoadon->nvhHoTenKhachHang = $request->nvhHoTenKhachHang;
        $nvhhoadon->nvhEmail = $request->nvhEmail;
        $nvhhoadon->nvhDienThoai = $request->nvhDienThoai;
        $nvhhoadon->nvhDiaChi = $request->nvhDiaChi;
        $nvhhoadon->nvhTongGiaTri = (double) $request->nvhTongGiaTri;
        $nvhhoadon->nvhTrangThai = $request->nvhTrangThai;
        $nvhhoadon->nvhNgayHoaDon = $request->nvhNgayHoaDon;
        $nvhhoadon->nvhNgayNhan = $request->nvhNgayNhan;

        // Lưu hóa đơn vào cơ sở dữ liệu
        $nvhhoadon->save();

        // Chuyển hướng về danh sách hóa đơn
        return redirect()->route('nvhAdmin.nvhhoadon');
    }

    // Sửa hóa đơn - Admin CRUD
    public function nvhEdit($id)
    {
        // Lấy hóa đơn cần sửa và danh sách khách hàng
        $nvhhoadon = nvh_HOA_DON::findOrFail($id);
        $nvhkhachhang = nvh_KHACH_HANG::all();
        return view('nvhAdmin.nvhhoadon.nvh-edit', ['nvhkhachhang' => $nvhkhachhang, 'nvhhoadon' => $nvhhoadon]);
    }

    // Xử lý khi gửi form sửa hóa đơn
    public function nvhEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu yêu cầu
        $validated = $request->validate([
            'nvhMaHoaDon' => 'required|unique:nvh_hoa_don,nvhMaHoaDon,' . $id,
            'nvhMaKhachHang' => 'required|exists:nvh_khach_hang,id',
            'nvhNgayHoaDon' => 'required|date',
            'nvhNgayNhan' => 'required|date',
            'nvhHoTenKhachHang' => 'required|string',
            'nvhEmail' => 'required|email',
            'nvhDienThoai' => 'required|numeric',
            'nvhDiaChi' => 'required|string',
            'nvhTongGiaTri' => 'required|numeric',
            'nvhTrangThai' => 'required|in:0,1,2',
        ]);

        // Cập nhật hóa đơn
        $nvhhoadon = nvh_HOA_DON::findOrFail($id);
        $nvhhoadon->nvhMaHoaDon = $request->nvhMaHoaDon;
        $nvhhoadon->nvhMaKhachHang = $request->nvhMaKhachHang;
        $nvhhoadon->nvhHoTenKhachHang = $request->nvhHoTenKhachHang;
        $nvhhoadon->nvhEmail = $request->nvhEmail;
        $nvhhoadon->nvhDienThoai = $request->nvhDienThoai;
        $nvhhoadon->nvhDiaChi = $request->nvhDiaChi;
        $nvhhoadon->nvhTongGiaTri = (double) $request->nvhTongGiaTri;
        $nvhhoadon->nvhTrangThai = $request->nvhTrangThai;
        $nvhhoadon->nvhNgayHoaDon = $request->nvhNgayHoaDon;
        $nvhhoadon->nvhNgayNhan = $request->nvhNgayNhan;

        // Lưu cập nhật vào cơ sở dữ liệu
        $nvhhoadon->save();

        // Chuyển hướng về danh sách hóa đơn
        return redirect()->route('nvhAdmin.nvhhoadon');
    }

    // Xóa hóa đơn - Admin CRUD
    public function nvhDelete($id)
    {
        // Xóa hóa đơn theo ID
        nvh_HOA_DON::where('id', $id)->delete();
        
        // Quay lại trang trước và thông báo xóa thành công
        return back()->with('hoadon_deleted', 'Đã xóa hóa đơn thành công!');
    }
}
?>
