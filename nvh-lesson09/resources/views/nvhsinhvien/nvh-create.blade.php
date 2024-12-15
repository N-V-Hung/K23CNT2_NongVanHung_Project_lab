<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <a href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body>
    <section class="containes">
        <form action="{{nvhcreate.nvhcreatesubmit}}">
            @csrf
            <div class="card">
                <div class="card-head"></div>
                    <div class="card-body">
                        <div class="mb-3 row">
                                <label for="NVHMASV" class="col-sm-2 col-form-label">ma sInh vien</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="NVHMASV" name="NVHMASV">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="NVHHOSV" class="col-sm-2 col-form-label">Ho sInh vien</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="NVHHOSV" name="NVHHOSV">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="NVHTENSV" class="col-sm-2 col-form-label">ten snh vien</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="NVHTENSV" name="NVHTENSV">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="NVHPHAI" class="col-sm-2 col-form-label">phai</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="NVHPHAI" name="NVHPHAI">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="NVHNGAYSINH" class="col-sm-2 col-form-label">ngay sinh</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="NVHNGAYSINH" name="NVHNGAYSINH">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="NVHNOISINH" class="col-sm-2 col-form-label">noi sinh</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="NVHNOISINH" name="NVHNOISINH">
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="NVHMAKH" class="col-sm-2 col-form-label">ma khoa</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="NVHMAKH" name="NVHMAKH">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="NVHHOCBONG" class="col-sm-2 col-form-label">hoc bong</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="NVHHOCBONG" name="NVHHOCBONG">
                                </div>
                            </div>
                    </div>
                <div class="card-footer">
                    <button class="btn btn-primary">
                        <a href="/nvh-sinhvien" class="btn btn-secondary">quay lai</a>
                    </button>
                </div>
                </div>
        </form>
    </section>
</body>
</html>