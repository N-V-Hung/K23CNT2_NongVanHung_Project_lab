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
            <form action="{{ route('nvhAdmin.nvhSanPham.nvhStore') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nvhMaSanPham" class="form-label">Mã Loại SP</label>
                    <input type="text" class="form-control" id="nvhMaSanPham" name="nvhMaSanPham" placeholder="Nhập mã loại sản phẩm" required>
                </div>
                <div class="mb-3">
                    <label for="nvhTenSanPham" class="form-label">Tên Loại SP</label>
                    <input type="text" class="form-control" id="nvhTenSanPham" name="nvhTenSanPham" placeholder="Nhập tên loại sản phẩm" required>
                </div>
                <div class="mb-3 row">
                    <label for="nvhHinhAnh" class="col-sm-2 col-form-label">hinh anh</label>
                    <div>
                        <input type="file" class="form-control" id="nvhHinhAnh" name="nvhHinhAnh" />
                        @error('nvhHinhAnh')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nvhSoLuong" class="form-label">so luong SP</label>
                    <input type="text" class="form-control" id="nvhSoLuong" name="nvhSoLuong" placeholder="so luong san pham" required>
                </div>
                <div class="mb-3">
                    <label for="nvhDoiGia" class="form-label">don gia SP</label>
                    <input type="text" class="form-control" id="nvhDoiGia" name="nvhDoiGia" placeholder="don gia san pham" required>
                </div>
                </div>
                <div class="mb-3">
                    <label for="nvhMaLoai" class="form-label">Loai danh muc</label>
                    <div class="col-sm-10">
                        <select name="nvhMaLoai" id="nvhMaLoai">
                            @foreach ($nvhLoaiSanPham as $item)
                                <option value="{{$item->nvhMaLoai}}">{{$item->nvhTeLoai}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="mb-3">
                    <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                    <select class="form-select" id="nvhTrangThai" name="nvhTrangThai" required>
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Thêm mới</button>
                <a href="{{ route('nvhAdmin.nvhSanPham.List') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
@endsection