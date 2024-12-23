<?php

namespace App\Http\Controllers;

use App\Models\nvhLoaiSanPham;
use Illuminate\Http\Request;

class nvhLoaiSanPhamController extends Controller
{
    // Admin : CRUD

    // List
    public function nvhList()
    {
        $nvhLoaiSanPham = nvhLoaiSanPham::all();
        return view('nvhAdmin.nvhLoaiSanPham.List', ['nvhLoaiSanPham' => $nvhLoaiSanPham]);
    }

    // Create
    public function nvhCreate()
    {
        return view('nvhAdmin.nvhLoaiSanPham.Create');
    }

    public function nvhStore(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'nvhMaLoai' => 'required|unique:nvh_loai_san_pham,nvhMaLoai|max:255',
            'nvhTenLoai' => 'required|max:255',
            'nvhTrangThai' => 'required|in:0,1', // đảm bảo giá trị đúng cho trạng thái
        ]);
    
        // Lưu vào cơ sở dữ liệu
        nvhLoaiSanPham::create([
            'nvhMaLoai' => $validated['nvhMaLoai'],
            'nvhTenLoai' => $validated['nvhTenLoai'],
            'nvhTrangThai' => $validated['nvhTrangThai'],
        ]);
        return redirect()->route('nvhAdmin.nvhLoaiSanPham.List')->with('success', 'Thêm mới loại sản phẩm thành công');
    }
    // Xem chi tiết
public function nvhShow($id)
{
    $item = nvhLoaiSanPham::where('nvhMaLoai', $id)->first(); 
    return view('nvhAdmin.nvhLoaiSanPham.Show', ['item' => $item]); 
}

// Sửa
public function nvhEdit($id)
{
    $item = nvhLoaiSanPham::where('nvhMaLoai', $id)->first(); 
    return view('nvhAdmin.nvhLoaiSanPham.Edit', compact('item')); 
}

// Cập nhật
public function nvhUpdate(Request $request, $id)
{
    $request->validate([
        'nvhTenLoai' => 'required|max:255',
        'nvhTrangThai' => 'required|in:0,1',
    ]);

    $data = $request -> only('nvhTenLoai', 'nvhTrangThai');

    nvhLoaiSanPham::where('nvhMaLoai', $id)->update($data); 

    return redirect()->route('nvhAdmin.nvhLoaiSanPham.List')->with('success', 'Cập nhật thành công!');
}

// Xóa
public function nvhDestroy($id)
{
    $item = nvhLoaiSanPham::where('nvhMaLoai', $id)->delete();
    return redirect()->route('nvhAdmin.nvhLoaiSanPham.List')->with('success', 'Xóa thành công!');
}

}    