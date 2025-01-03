@extends('nvhLayout.Admin.nvhMaster')
@section('title', 'Sửa sản phẩm')

@section('content-body')
    <div class="container">
        <h1>Sửa loại sản phẩm</h1>
        <form action="{{ route('nvhAdmin.nvhSanPham.Update', $item->nvhMaSanPham) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nvhTenSanPham">Tên Loại SP</label>
                <input type="text" name="nvhTenSanPham" class="form-control" value="{{ $item->nvhTenSanPham }}" required>
            </div>
            <div class="form-group">
                <label for="nvhHinhAnh">hình ảnh</label>
                <input type="text" name="nvhHinhAnh" class="form-control" value="{{ $item->nvhHinhAnh }}" required>
            </div>
            <div class="form-group">
                <label for="nvhSoLuong">số lượng </label>
                <input type="text" name="nvhSoLuong" class="form-control" value="{{ $item->nvhSoLuong }}" required>
            </div>
            <div class="form-group">
                <label for="nvhDoiGia">Đơn giá </label>
                <input type="text" name="nvhDoiGia" class="form-control" value="{{ $item->nvhDoiGia }}" required>
            </div>
        
            <div class="form-group">
                <label for="nvhMaLoai">Mã Loại</label>
                <input type="text" name="nvhMaLoai" class="form-control" value="{{ $item->nvhMaLoai }}" required>
            </div>

            <div class="form-group">
                <label for="nvhTrangThai">Trạng thái</label>
                <select name="nvhTrangThai" class="form-control">
                    <option value="1" {{ $item->nvhTrangThai == 1 ? 'selected' : '' }}>Hoạt động</option>
                    <option value="0" {{ $item->nvhTrangThai == 0 ? 'selected' : '' }}>Không hoạt động</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection