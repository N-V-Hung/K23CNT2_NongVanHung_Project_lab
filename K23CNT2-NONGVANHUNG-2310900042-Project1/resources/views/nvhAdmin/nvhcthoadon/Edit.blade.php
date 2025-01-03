@extends('nvhLayout.Admin.nvhMaster')
@section('title','Chỉnh Sửa Chi Tiết Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('nvhadmin.nvhcthoadon.nvhEditSubmit', $nvhcthoadon->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header">
                            <h1>Chỉnh Sửa Chi Tiết Hóa Đơn</h1>
                        </div>

                        <div class="mb-3">
                            <label for="nvhHoaDonID" class="form-label">Mã Hóa Đơn</label>
                            <select name="nvhHoaDonID" id="nvhHoaDonID" class="form-control">
                                @foreach ($nvhhoadon as $item)
                                    <option value="{{ $item->id }}" {{ $nvhcthoadon->nvhHoaDonID == $item->id ? 'selected' : '' }}>{{ $item->nvhMaHoaDon }}</option>
                                @endforeach
                            </select>
                            @error('nvhHoaDonID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvhSanPhamID" class="form-label">Mã Sản Phẩm</label>
                            <select name="nvhSanPhamID" id="nvhSanPhamID" class="form-control">
                                @foreach ($nvhsanpham as $item)
                                    <option value="{{ $item->id }}" {{ $nvhcthoadon->nvhSanPhamID == $item->id ? 'selected' : '' }}>{{ $item->nvhMaSanPham }}</option>
                                @endforeach
                            </select>
                            @error('nvhSanPhamID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvhSoLuongMua" class="form-label">Số Lượng Mua</label>
                            <input type="number" class="form-control" id="nvhSoLuongMua" name="nvhSoLuongMua" value="{{ old('nvhSoLuongMua', $nvhcthoadon->nvhSoLuongMua) }}" min="1" oninput="calculateThanhTien()">
                            @error('nvhSoLuongMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvhDonGiaMua" class="form-label">Đơn Giá Mua</label>
                            <input type="number" class="form-control" id="nvhDonGiaMua" name="nvhDonGiaMua" value="{{ old('nvhDonGiaMua', $nvhcthoadon->nvhDonGiaMua) }}" oninput="calculateThanhTien()">
                            @error('nvhDonGiaMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvhThanhTien" class="form-label">Thành Tiền</label>
                            <input type="number" class="form-control" id="nvhThanhTien" name="nvhThanhTien" value="{{ old('nvhThanhTien', $nvhcthoadon->nvhThanhTien) }}" readonly>
                            @error('nvhThanhTien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nvhTrangThai0" name="nvhTrangThai" value="0" {{ $nvhcthoadon->nvhTrangThai == 0 ? 'checked' : '' }} />
                                <label for="nvhTrangThai0">Hoàn Thành</label>
                                &nbsp;
                                <input type="radio" id="nvhTrangThai1" name="nvhTrangThai" value="1" {{ $nvhcthoadon->nvhTrangThai == 1 ? 'checked' : '' }} />
                                <label for="nvhTrangThai1">Trả Lại</label>
                                &nbsp;
                                <input type="radio" id="nvhTrangThai2" name="nvhTrangThai" value="2" {{ $nvhcthoadon->nvhTrangThai == 2 ? 'checked' : '' }} />
                                <label for="nvhTrangThai2">Xóa</label>
                            </div>
                            @error('nvhTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Cập Nhật</button>
                            <a href="{{ route('nvhadmins.nvhcthoadon') }}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Hàm tính Thành Tiền
        function calculateThanhTien() {
            var quantity = parseFloat(document.getElementById('nvhSoLuongMua').value);
            var unitPrice = parseFloat(document.getElementById('nvhDonGiaMua').value);
            var thanhTien = quantity * unitPrice;
            document.getElementById('nvhThanhTien').value = thanhTien.toFixed(2);  // Làm tròn đến 2 chữ số thập phân
        }
    </script>
@endsection