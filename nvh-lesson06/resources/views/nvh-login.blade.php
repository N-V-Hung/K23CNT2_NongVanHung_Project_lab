<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <section class="container my-3">
        <form action="{{route('nvhlogin.nvhloginSubmit') }}" method="post">
            <div class="card">
                <div class="hearder">
                    <h1>NVH - login</h1>
                </div>
                <div class="body">
                    <div class="mb-3">
                        <label for="nvhEmil" class="form-label">Email</label>
                        <input class="form-control" type="email" id="nvhEmail" name="nvhEmail" placeholder="nvh@gmail.com"/>
                    @error('nvhEmail')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nvhPassword" class="form-label">Password</label>
                        <input class="form-control" type="Password" id="nvhPass" name="nvhPass" placeholder="xxxx"/>
                    @error('nvhPass')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                      
                    </div>
                </div>
                <div class="footer">
                    <button class="btn btn-primary">Submit</button>
                    @if (Session::has('nvh-error'))
                        <div class="alert alert-danger">
                            {{ Session::get('nvh-error') }}
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </section>
    
</body>
</html>