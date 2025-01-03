@extends('nvhLayout.Admin.nvhMaster')
@section('title','Create Khách Hàng')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('nvhadmin.nvhkhachhang.nvhCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nvhMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="nvhMaKhachHang" name="nvhMaKhachHang" value="{{ old('nvhMaKhachHang') }}" >
                                @error('nvhMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="nvhHoTenKhachHang" name="nvhHoTenKhachHang" value="{{ old('nvhHoTenKhachHang') }}" >
                                @error('nvhHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="nvhEmail" name="nvhEmail" value="{{ old('nvhEmail') }}" >
                                @error('nvhEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="nvhMatKhau" name="nvhMatKhau" value="{{ old('nvhMatKhau') }}" >
                                @error('nvhMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="nvhDienThoai" name="nvhDienThoai" value="{{ old('nvhDienThoai') }}" >
                                @error('nvhDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="nvhDiaChi" name="nvhDiaChi" value="{{ old('nvhDiaChi') }}" >
                                @error('nvhDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="nvhNgayDangKy" name="nvhNgayDangKy" value="{{ old('nvhNgayDangKy') }}" >
                                @error('nvhNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nvhTrangThai0" name="nvhTrangThai" value="0" checked/>
                                    <label for="nvhTrangThai1"> Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="nvhTrangThai1" name="nvhTrangThai" value="1"/>
                                    <label for="nvhTrangThai0">Tạm Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="nvhTrangThai2" name="nvhTrangThai" value="2"/>
                                    <label for="nvhTrangThai0">Khóa</label>
                                </div>
                                @error('nvhTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('nvhAdmin.nvhkhachhang')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection