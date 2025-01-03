<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Quản lý sản phẩm')</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* Nền body với hình ảnh */
        body {
            background-size: cover;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            transition: background 0.5s ease; /* Tạo hiệu ứng mượt mà cho background */
        }

        /* Kiểu dáng của sidebar */
        .sideBar {
            width: 250px;
            background: linear-gradient(135deg, #7e2914, #7e2914); /* Nền gradient */
            min-height: 100vh;
            padding-top: 30px;
            transition: width 0.3s ease, padding 0.3s ease; /* Thêm hiệu ứng mượt mà khi thay đổi kích thước */
        }

        .sideBar a {
            color: #fff;
            text-decoration: none;
            padding: 15px;
            display: block;
            font-size: 1.1em;
            border: none; /* Loại bỏ viền dưới các liên kết */
            transition: background-color 0.3s ease, transform 0.3s ease, padding 0.3s ease; /* Thêm hiệu ứng khi hover */
        }

        .sideBar a:hover {
            background-color: #8d8c8ce8;
            transform: translateX(10px);
            padding-left: 20px; /* Tăng khoảng cách cho hiệu ứng mượt mà */
        }

        /* Ẩn sidebar trên các màn hình nhỏ */
        @media (max-width: 767px) {
            .sideBar {
                width: 100%;
                padding-top: 15px;
            }

            .sideBar a {
                font-size: 1em;
            }
        }

        /* Kiểu dáng của nội dung chính */
        .wrapper {
            width: calc(100% - 250px);
            min-height: 100vh;
            background: rgba(255, 255, 255, 0.9);
            padding: 0;
            transition: all 0.3s ease;
        }

        /* Kiểu dáng của header */
        header {
            background: linear-gradient(135deg,  #7e2914, #be6d6d); /* Gradient matching */
            color: white;
            padding: 15px 30px;
            font-size: 1.6em;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease; /* Tạo hiệu ứng mượt mà khi thay đổi background */
        }

        /* Kiểu dáng của thẻ (Card) */
        .card {
            border: none; /* Loại bỏ viền của thẻ */
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(238, 231, 231, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
            overflow: hidden; /* Đảm bảo không bị tràn nội dung */
        }

        .card:hover {
            transform: translateY(-10px); /* Dịch chuyển lên khi hover */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15); /* Tăng bóng khi hover */
        }

        /* Kiểu dáng của footer */
        footer {
            background-color: #7e2914;
            color: white;
            padding: 10px;
            text-align: center;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        footer:hover {
            background-color: #7e2914; /* Màu nền đổi khi hover vào footer */
        }

        /* Loại bỏ viền của các input và button trong form */
        input, button {
            border: none; /* Loại bỏ viền */
        }

        input:focus, button:focus {
            outline: none; /* Loại bỏ outline khi focus vào input hoặc button */
        }

        /* Loại bỏ viền của các thẻ a khi ở trạng thái focus */
        a:focus {
            outline: none;
        }

        /* Thu nhỏ ảnh để vừa khung */
        .product-img {
            width: 70%; /* Đảm bảo ảnh chiếm hết chiều rộng của khung */
            height: auto; /* Tự động điều chỉnh chiều cao dựa trên tỷ lệ của ảnh */
            object-fit: cover; /* Đảm bảo ảnh được cắt để lấp đầy khung mà không bị kéo dãn */
        }

    </style>
</head>
<body>
    <section class="container-fluid d-flex">
        <!-- Sidebar -->
        <nav class="sideBar">
            @include('nvhLayout.Admin._menu')
        </nav>

        <!-- Main content -->
        <section class="wrapper">
            <header>
                @include('nvhLayout.Admin._headerTitle')
            </header>
            <div class="content-body">
                @yield('content-body')
            </div>
        </section>
    </section>

    <!-- Footer -->
    <footer>
        &copy; 2025 Duy Khánh Store. All Rights Reserved.
    </footer>

    <!-- Thêm ảnh quảng cáo dưới footer -->
    <div class="advertisement">
        <img src="{{ asset('img/header/quangcao.webp') }}" alt="Quảng cáo" class="img-fluid w-100">
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>