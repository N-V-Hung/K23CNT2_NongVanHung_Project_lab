@extends('nvhLayout.Admin.nvhMaster')

@section('title', 'Chi tiết loại sản phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col-12">
                <h1>Chi tiết loại sản phẩm</h1>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <th>Mã Loại SP</th>
                    <td>{{ $item->nvhMaSanPham }}</td>
                </tr>
                <tr>
                    <th>Tên Loại SP</th>
                    <td>{{ $item->nvhTenSanPham }}</td>
                </tr>
                <tr>
                    <th>Tên Loại SP</th>
                    <td>{{ $item->nvhHinhAnh }}</td>
                </tr>
                <tr>
                    <th>Tên Loại SP</th>
                    <td>{{ $item->nvhSoLuong }}</td>
                </tr>
                <tr>
                    <th>Tên Loại SP</th>
                    <td>{{ $item->nvhMaLoai }}</td>
                </tr>
                
                <tr>
                    <th>Trạng Thái</th>
                    <td>{{ $item->nvhTrangThai == 1 ? 'Hoạt động' : 'Không hoạt động' }}</td>
                </tr>
            </table>
            <a href="{{ route('nvhAdmin.nvhSanPham.List') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
@endsection