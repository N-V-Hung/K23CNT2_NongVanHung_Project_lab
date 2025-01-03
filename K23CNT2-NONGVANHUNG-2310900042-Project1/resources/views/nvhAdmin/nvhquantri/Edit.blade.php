@extends('nvhLayout.Admin.nvhMaster')
@section('title', 'Chỉnh Sửa Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('nvhAdmin.nvhquantri.nvhEditSubmit', $nvhquantri->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nvhTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="nvhTaiKhoan" name="nvhTaiKhoan" value="{{ $nvhquantri->nvhTaiKhoan }}" required>
                @error('nvhTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nvhMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="nvhMatKhau" name="nvhMatKhau">
                @error('nvhMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nvhTrangThai">Trạng Thái</label>
                <select name="nvhTrangThai" id="nvhTrangThai" class="form-control" required>
                    <option value="0" {{ $nvhquantri->nvhTrangThai == 0 ? 'selected' : '' }}>Cho Phép Đăng Nhập</option>
                    <option value="1" {{ $nvhquantri->nvhTrangThai == 1 ? 'selected' : '' }}>Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Cập Nhật</button>
        </form>
    </div>
@endsection