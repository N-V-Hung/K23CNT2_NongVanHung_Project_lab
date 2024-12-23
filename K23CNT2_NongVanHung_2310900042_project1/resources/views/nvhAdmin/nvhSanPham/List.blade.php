@extends('nvhLayout.Admin.nvhMaster')
@section('title','Danh sách loại sản phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
           <div class="col-12">
            <h1>Danh sách loại sản phẩm</h1> 
            <a href="{{route('nvhAdmin.nvhSanPham.Create')}}" class="btn btn-success">Thêm mới</a>
           </div>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã  SP</th>
                        <th>Tên  SP</th>
                        <th>Hinh Anh</th>
                        <th>So luong</th>
                        <th>Don Gia</th>
                        <th>Ma loai</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nvhSanPham as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nvhMaSanPham}}</td>
                            <td>{{$item->nvhTenSanPham}}</td>
                            <td>{{$item->nvhHinhAnh}}</td>
                            <td>{{$item->nvhSoLuong}}</td>
                            <td>{{$item->nvhDoiGia}}</td>
                            <td>{{$item->nvhMaLoai}}</td>
                            <td>{{ $item->nvhTrangThai == 1 ? 'Hoạt động' : 'Không hoạt động' }}</td>
                            <td>
                                <a href="{{ route('nvhAdmin.nvhSanPham.Show', ['id' => $item->nvhMaSanPham]) }}" class="btn btn-primary">Xem</a>
                                <a href="{{ route('nvhAdmin.nvhSanPham.Edit', ['id' => $item->nvhMaSanPham]) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('nvhAdmin.nvhSanPham.Destroy', $item->nvhMaSanPham) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                </form>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5">Không có dữ liệu</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection