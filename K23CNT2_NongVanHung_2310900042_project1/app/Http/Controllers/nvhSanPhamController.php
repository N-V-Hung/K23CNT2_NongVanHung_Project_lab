<?php

namespace App\Http\Controllers;

use App\Models\nvhSanPham;
use Illuminate\Http\Request;

class nvhSanPhamController extends Controller
{
    // Admin : CRUD

    // List
    public function nvhList()
    {
        $nvhSanPham = nvhSanPham::all();
        return view('nvhAdmin.nvhSanPham.List', ['nvhSanPham' => $nvhSanPham]);
    }

    // Create
    public function nvhCreate()
    {
        return view('nvhAdmin.nvhSanPham.Create');
    }

    public function nvhStore(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'nvhMaSanPham' => 'required|unique:nvh_san_pham,nvhMaSanPham|max:255',
            'nvhTenSanPham' => 'required|max:255',
            'nvhHinhAnh' => 'required|max:255',
            'nvhSoLuong' => 'required',
            'nvhDoiGia' => 'required',
            'nvhMaSanPham' => 'required',
            'nvhTrangThai' => 'required|in:0,1', // đảm bảo giá trị đúng cho trạng thái
        ]);
    
        // Lưu vào cơ sở dữ liệu
        nvhSanPham::create([
            'nvhMaSanPham' => $validated['nvhMaSanPham'],
            'nvhTenSanPham' => $validated['nvhTenSanPham'],
            'nvhHinhAnh' => $validated['nvhHinhAnh'],
            'nvhSoLuong' => $validated['nvhSoLuong'],
            'nvhDoiGia' => $validated['nvhDoiGia'],
            'nvhMaLoai' => $validated['nvhMaLoai'],
            'nvhTrangThai' => $validated['nvhTrangThai'],
        ]);
        return redirect()->route('nvhAdmin.nvhSanPham.List')->with('success', 'Thêm mới sản phẩm thành công');
    }
    // Xem chi tiết
public function nvhShow($id)
{
    $item = nvhSanPham::where('nvhMaSanPham', $id)->first(); 
    return view('nvhAdmin.nvhSanPham.Show', ['item' => $item]); 
}

// Sửa
public function nvhEdit($id)
{
    $item = nvhSanPham::where('nvhMaSanPham', $id)->first(); 
    return view('nvhAdmin.nvhSanPham.Edit', compact('item')); 
}

// Cập nhật
public function nvhUpdate(Request $request, $id)
{
    $request->validate([
        'nvhTenSanPham' => 'required|max:255',
        'nvhHinhAnh' => 'required|max:255',
        'nvhSoLuong' => 'required',
        'nvhDoiGia' => 'required',
        'nvhMaSanPham' => 'required',
        'nvhTrangThai' => 'required|in:0,1',
    ]);

    $data = $request -> only('nvhTenSanPham', 'nvhTrangThai');

    nvhSanPham::where('nvhMaSanPham', $id)->update($data); 

    return redirect()->route('nvhAdmin.nvhSanPham.List')->with('success', 'Cập nhật thành công!');
}

// Xóa
public function nvhDestroy($id)
{
    $item = nvhSanPham::where('nvhMaSanPham', $id)->delete();
    return redirect()->route('nvhAdmin.nvhSanPham.List')->with('success', 'Xóa thành công!');
}

}    
  

