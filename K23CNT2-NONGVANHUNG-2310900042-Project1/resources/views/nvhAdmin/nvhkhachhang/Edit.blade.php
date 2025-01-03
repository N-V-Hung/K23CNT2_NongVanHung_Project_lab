@extends('nvhLayout.Admin.nvhMaster')
@section('title','Sửa Loại Khách Hàng')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the nvhMaKhachHang as a parameter -->
                <form action="{{ route('nvhAdmin.nvhkhachhang.nvhEditSubmit', ['id' => $nvhkhachhang->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $nvhkhachhang->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="nvhMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="nvhMaKhachHang" name="nvhMaKhachHang" value="{{ $nvhkhachhang->nvhMaKhachHang }}" >
                                @error('nvhMaKhachHang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="nvhHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="nvhHoTenKhachHang" name="nvhHoTenKhachHang" value="{{ old('nvhHoTenKhachHang', $nvhkhachhang->nvhHoTenKhachHang) }}" >
                                @error('nvhHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="nvhEmail" name="nvhEmail" value="{{ old('nvhEmail', $nvhkhachhang->nvhEmail) }}" >
                                @error('nvhEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="nvhDiaChi" name="nvhDiaChi" value="{{ old('nvhDiaChi', $nvhkhachhang->nvhDiaChi) }}" >
                                @error('nvhDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="nvhNgayDangKy" name="nvhNgayDangKy" value="{{ old('nvhNgayDangKy', $nvhkhachhang->nvhNgayDangKy) }}" >
                                @error('nvhNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nvhTrangThai0" name="nvhTrangThai" value="0" {{ old('nvhTrangThai', $nvhkhachhang->nvhTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="nvhTrangThai0">Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="nvhTrangThai1" name="nvhTrangThai" value="1" {{ old('nvhTrangThai', $nvhkhachhang->nvhTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="nvhTrangThai1">Tạm Khóa</label>
                           
                                    &nbsp;
                                    <input type="radio" id="nvhTrangThai2" name="nvhTrangThai" value="2" {{ old('nvhTrangThai', $nvhkhachhang->nvhTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="nvhTrangThai0">Khóa</label>
                                </div>
                                @error('nvhTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('nvhAdmin.nvhkhachhang') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection