<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach nha cung cap</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>danh sach nha cung cap</h1>
    </header>
    <section class="container my-1 border p-2">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ma nha cung cap</th>
                    <th>ten nha cung cap</th>
                    <th>dia chi</th>
                    <th>email</th>
                    <th>dien thoai</th>
                </tr>
            </thead>
            <tbody>
                $forelse($nvhNhaCCs as $item)
                    <tr>
                        <td>1</td>
                        <td>{{$item->$nvhMaNCC}}</td>
                        <td>{{$item->$nvhTenNCC}}</td>
                        <td>{{$item->$nvhDiaChi}}</td>
                        <td>{{$item->$nvhEmail}}</td>
                        <td>{{$item->$nvhSDT}}</td>
                        <td>
                            view / edit / delete
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">chua co du lieu</td>
                    </tr>
                        
            </tbody>
        </table>
        <button class="btn btn-primary">Them moi</button>
    </section>
</body>
</html>
