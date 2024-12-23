@extends('nvhLayout.Admin.nvhMaster')
@section('title', 'Sửa loại sản phẩm')

@section('content-body')
    <div class="container">
        <h1>Sửa loại sản phẩm</h1>
        <form action="{{ route('nvhAdmin.nvhLoaiSanPham.Update', $item->nvhMaLoai) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nvhTenLoai">Tên Loại SP</label>
                <input type="text" name="nvhTenLoai" class="form-control" value="{{ $item->nvhTenLoai }}" required>
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