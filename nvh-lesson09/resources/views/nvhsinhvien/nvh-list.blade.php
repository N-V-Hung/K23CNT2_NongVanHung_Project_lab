<div>
<!-- Live as if you were to die tomorrow. Learn as if you were to live forever.
- Mahatma Gandhi -->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .btn{--bs-btn-line-height: 1;
    }
    </style>
</head>
<body>
    <section class="container my-3">
        <div class="card">
            <div class="card-header">
                <h1>Danh sách sinh viên</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Mã sinh viên</th>
                        <th>Họ và tên</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Nơi sinh</th>
                        <th>Mã khoa</th>
                        <th>Học bổng</th>
                        <th class="text-center">Chức năng</th>
                    </tr>
                </thead>
            <tbody>
                @if (Session::has('sinhVien_deleted'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('sinhVien_deleted')}}
                    </div>
                @endif
                @php
                    $stt=0;
                @endphp
                @foreach ($nvhSinhvien as $item)
                    @php
                        $stt++;
                    @endphp
                    <tr>
                        <th class="text-center">{{$stt}}</th>
                        <td>{{$item->NVHMASV}}</td>
                        <td>{{$item->NVHHOSV}} {{$item->NVHTENSV}}</td>
                        <td>{{$item->NVHPHAI}}</td>
                        <td>{{$item->NVHNGAYSINH}}</td>
                        <td>{{$item->NVHNOISINH}}</td>
                        <td>{{$item->NVHMAKH}}</td>
                        <td class="text-right">{{$item->NVHHOCBONG}}</td>
                        <td class="text-center">
                            <a href="/sinhvien/detail/{{$item->NVHMASV}}"

                            class="btn btn-success">

                        Chi tiết</a>
                            <a href="/sinhvien/edit/{{$item->MaSV}}"

                            class="btn btn-primary">

                            Sửa</a>
                            <a href="/sinhvien/delete/{{$item->MaSV}}"

                            class="btn btn-danger"

                            onclick="return confirm('Bạn muốn xoa sinh viên này không? Mã:' + {{$item->MaSV}});">
                            Xóa
                        </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            </div>
            <div class="card-footer">
                <h3>Tổng số: {{$nvhSinhViens->count()}}</h3>
                <a href="/nvh-sinhvien/create" class="btn btn-primary">Thêm mới</a>
            </div>
        </div>
    </section>
</body>
</html>