@extends('nvhLayout.Admin.nvhMaster')
@section('title', 'Thêm mới loại sản phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route(adminsanphamCreateSubmit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nvhMaSanPham" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="nvhMaSanPham" name="nvhMaSanPham" value="{{ old('nvhMaSanPham') }}">
                                @error('nvhMaSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhTenSanPham" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="nvhTenSanPham" name="nvhTenSanPham" value="{{ old('nvhTenSanPham') }}">
                                @error('nvhTenSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="nvhHinhAnh" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" id="nvhHinhAnh" name="nvhHinhAnh" accept="image/*">
                                @error('nvhHinhAnh')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhSoLuong" class="form-label">Số Lượng</label>
                                <input type="number" class="form-control" id="nvhSoLuong" name="nvhSoLuong" value="{{ old('nvhSoLuong') }}">
                                @error('nvhSoLuong')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhDonGia" class="form-label">Đơn Giá</label>
                                <input type="number" class="form-control" id="nvhDonGia" name="nvhDonGia" value="{{ old('nvhDonGia') }}">
                                @error('nvhDonGia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhMaLoai" class="form-label">Loại Danh Muc</label>
                                <select name="nvhMaLoai" id="nvhMaLoai" class="form-control">
                                    @forelse ($nvh
loaisanpham as $item)
                                        <option value="{{ $item->id }}" {{ old('nvh
        MaLoai') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nvh
            TenLoai }}
                                        </option>
                                    @empty
                                        <option value="">Không có loại sản phẩm</option>
                                    @endforelse
                                </select>
                                @error('nvhMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nvh
TrangThai1" name="nvh
TrangThai" value="0" {{ old('nvh
    TrangThai') == '0' ? 'checked' : '' }} />
                                    <label for="nvh
TrangThai1"> Hiển Thị</label>
                                    &nbsp;
                                    <input type="radio" id="nvh
TrangThai0" name="nvh
TrangThai" value="1" {{ old('nvh
    TrangThai') == '1' ? 'checked' : '' }} />
                                    <label for="nvh
TrangThai0">Khóa</label>
                                </div>
                                @error('nvhTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{ route('nvadims.nvsanpham') }}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection