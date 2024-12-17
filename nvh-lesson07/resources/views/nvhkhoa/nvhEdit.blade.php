<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin chi tiết khoa</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="container my-3">
        <form action="{{ route('nvhkhoa.nvhEditSubmit') }}" method="post"></form>
        <div class="card">
            <div class="card-header">
                <h3>Thêm mới thông tin khoa</h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="MaKH" class="co;-sm-2 col-form-label">Max Khoa</label>
                    <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintnext" 
                            name="MaKH" id="MaKH" value="{{$khoa->MaKH}}">
                    </div>
               </div>
               <div class="mb-3 row">
                    <label for="TenKH" class="co;-sm-2 col-form-label">Ten Khoa</label>
                    <div class="col-sm-10">
                            <input type="text" readonly class="form-control" 
                            name="TenKH" id="TenKH" value="{{$khoa->TenKH}}">
                    </div>
               </div>  
            </div>
            <div class="card-footer">
                <button class="btn btn-primary mx-2">Submit</button>
                <a href="/khoa" class="btn btn-secondary">Trở lại</a>
            </div>
           
            </div>
        </div>
    </section>
</body>
</html>