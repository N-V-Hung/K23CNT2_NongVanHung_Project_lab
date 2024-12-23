@extends('nvhLayout.Admin.nvhMaster')
@section('title', 'Thêm mới loại sản phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới loại sản phẩm</h1>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('nvhAdmin.nvhLoaiSanPham.nvhStore') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nvhMaLoai" class="form-label">Mã Loại SP</label>
                    <input type="text" class="form-control" id="nvhMaLoai" name="nvhMaLoai" placeholder="Nhập mã loại sản phẩm" required>
                </div>
                <div class="mb-3">
                    <label for="nvhTenLoai" class="form-label">Tên Loại SP</label>
                    <input type="text" class="form-control" id="nvhTenLoai" name="nvhTenLoai" placeholder="Nhập tên loại sản phẩm" required>
                </div>
                <div class="mb-3">
                    <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                    <select class="form-select" id="nvhTrangThai" name="nvhTrangThai" required>
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Thêm mới</button>
                <a href="{{ route('nvhAdmin.nvhLoaiSanPham.List') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
@endsection