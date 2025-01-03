<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nvh_KHACH_HANG; 
class nvh_KHACH_HANGcontroller extends Controller
{
    //
    // CRUD
    // list
    public function nvhList()
    {
        $khachhangs = nvh_KHACH_HANG::all();
        return view('nvhAdmins.nvhkhachhang.nvh-list',['khachhangs'=>$khachhangs]);
    }
    // detail 
    public function nvhDetail($id)
    {
        $nvhkhachhang = nvh_KHACH_HANG::where('id',$id)->first();
        return view('nvhAdmins.nvhkhachhang.nvh-detail',['nvhkhachhang'=>$nvhkhachhang]);
    }
    // create
    public function nvhCreate()
    {
        return view('nvhAdmins.nvhkhachhang.nvh-create');
    }
    //post
    public function nvhCreateSubmit(Request $request)
    {
        $validate = $request->validate([
            'nvhMaKhachHang' => 'required|unique:nvh_khach_hang,nvhMaKhachHang',
            'nvhHoTenKhachHang' => 'required|string',
            'nvhEmail' => 'required|email|unique:nvh_khach_hang,nvhEmail',  
            'nvhMatKhau' => 'required|min:6',
            'nvhDienThoai' => 'required|numeric|unique:nvh_khach_hang,nvhDienThoai',  
            'nvhDiaChi' => 'required|string',
            'nvhNgayDangKy' => 'required|date',  
            'nvhTrangThai' => 'required|in:0,1,2',
        ]);

        $nvhkhachhang = new nvh_KHACH_HANG;
        $nvhkhachhang->nvhMaKhachHang = $request->nvhMaKhachHang;
        $nvhkhachhang->nvhHoTenKhachHang = $request->nvhHoTenKhachHang;
        $nvhkhachhang->nvhEmail = $request->nvhEmail;

        $nvhkhachhang->nvhDiaChi = $request->nvhDiaChi;
        $nvhkhachhang->nvhNgayDangKy = $request->nvhNgayDangKy;
        $nvhkhachhang->nvhTrangThai = $request->nvhTrangThai;

        $nvhkhachhang->save();

        return redirect()->route('nvhadmins.nvhkhachhang');


    }

    // edit
    public function nvhEdit($id)
    {
        // Lấy khách hàng theo id
        $nvhkhachhang = nvh_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$nvhkhachhang) {
            return redirect()->route('nvhadmins.nvhkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('nvhAdmins.nvhkhachhang.nvh-edit', ['nvhkhachhang' => $nvhkhachhang]);
    }
    
    public function nvhEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $validate = $request->validate([
            'nvhMaKhachHang' => 'required|unique:nvh_khach_hang,nvhMaKhachHang,' . $id, // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'nvhHoTenKhachHang' => 'required|string',
            'nvhEmail' => 'required|email|unique:nvh_khach_hang,nvhEmail,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'nvhDiaChi' => 'required|string',
            'nvhNgayDangKy' => 'required|date',
            'nvhTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Lấy khách hàng theo id
        $nvhkhachhang = nvh_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$nvhkhachhang) {
            return redirect()->route('nvhadmins.nvhkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Cập nhật các giá trị từ request
        $nvhkhachhang->nvhMaKhachHang = $request->nvhMaKhachHang;
        $nvhkhachhang->nvhHoTenKhachHang = $request->nvhHoTenKhachHang;
        $nvhkhachhang->nvhEmail = $request->nvhEmail;

        $nvhkhachhang->nvhDiaChi = $request->nvhDiaChi;
        $nvhkhachhang->nvhNgayDangKy = $request->nvhNgayDangKy;
        $nvhkhachhang->nvhTrangThai = $request->nvhTrangThai;
    
        // Lưu khách hàng đã cập nhật
        $nvhkhachhang->save();
    
        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('nvhadmins.nvhkhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }
    
    //delete
    public function nvhDelete($id)
    {
        nvh_KHACH_HANG::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }

}