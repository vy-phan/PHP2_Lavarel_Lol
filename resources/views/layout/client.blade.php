<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- OWL CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <!-- OWL JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Thư viện icon -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>

    <div class="fixed-header-wrapper">
        <header class="d-none d-lg-block">
            <div class="container my-2">
                <div class="d-flex align-items-center justify-content-between">
                    {{-- Logo --}}
                    <div class="d-flex align-items-center">
                        <img class="img-fluid logo me-3" src="images/logos/logo_mamnon.png" alt="">
                        <p class="text-danger fw-bold mb-0">
                            TRƯỜNG MẦM NON <br>
                            <b class="ms-4">LITTLE SUN</b>
                        </p>
                    </div>
                    {{-- Tìm kiếm --}}
                    <div class="input-group seacher">
                        <input class="form-control fs-22" type="text" placeholder="Nhập từ khóa tìm kiếm..."
                            aria-label="Tìm kiếm...">
                        <button class="btn btn-sm btn-danger" type="button">
                            <i class='bx bx-search p-1 fs-5'></i>
                        </button>
                    </div>
                    {{-- Liên hệ --}}
                    <div class="d-flex align-items-center">
                        <a type="button" class="btn btn-outline-danger fw-bold rounded-pill me-3">HOTLINE: 0123 456
                            789</a>
                        <div class="d-flex">
                            <a
                                class="fw-bold fs-5 bg-primary text-white rounded d-flex align-items-center justify-content-center p-2 me-2 text-decoration-none">
                                <i class='bx bxl-facebook'></i>
                            </a>
                            <a
                                class="fw-bold fs-5 bg-black text-white rounded d-flex align-items-center justify-content-center p-2 me-2 text-decoration-none">
                                <i class='bx bxl-tiktok'></i>
                            </a>
                            <a
                                class="fw-bold fs-5 bg-danger text-white rounded d-flex align-items-center justify-content-center p-2 text-decoration-none">
                                <i class='bx bxl-youtube'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg bg-navbar shadow-sm">
            <div class="container">
                <a class="navbar-brand d-block d-lg-none" href="">
                    <div class="d-flex align-items-center">
                        <img class="logo-navbar me-2" src="images/logos/logo_mamnon.png" alt="">
                        <p class="text-danger fw-bold mb-2 pt-2 fs-6">
                            TRƯỜNG MẦM NON <br>
                            <b class="ms-4">LITTLE SUN</b>
                        </p>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav fw-bold d-flex justify-content-between w-75">
                        <li class="nav-item text-uppercase">
                            <a class="nav-link active" aria-current="page" href="{{route('trangchu')}}">Trang chủ</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('tuyensinh')}}">Tuyển sinh</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('lophoc')}}">Lớp học</a>
                        </li>
                        <li class="nav-item dropdown text-uppercase">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Phụ huynh
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('thongtinphuhuynh')}}">Thông tin phụ huynh</a></li>
                                <li><a class="dropdown-item" href="{{route('thongtinhocsinh')}}">Thông tin học sinh</a></li>
                            </ul>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('tintuc')}}">Tin tức và sự kiện</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{route('lienhe')}}">Liên hệ</a>
                        </li>

                        @auth
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Chào, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="dropdown-item d-flex align-items-center justify-content-center">
                                        <i class='bx bx-user me-2'></i> Profile
                                    </a>
                                </li>
                                
                                @if(auth()->user()->role === 'admin')
                                <li>
                                    <a href="{{ route('admin.quanlytaikhoan') }}" class="dropdown-item d-flex align-items-center justify-content-center">
                                        <i class='bx bx-cog me-2'></i> Quản trị
                                    </a>
                                </li>
                                @endif
                                
                                <li>
                                    <form action="{{ route('dangxuat') }}" method="POST" id="logout-form">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item d-flex text-danger align-items-center justify-content-center">
                                            <i class='bx bx-log-out me-2'></i> Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        @endauth

                        @guest
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="{{ route('dangnhap') }}">Đăng nhập</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>
        {{ $slot }}
    </main>

    <footer class="footer-area text-white pt-5">
        <div class="container">
            <div class="row">
                <!-- Trường Mầm non -->
                <div class="col-lg-4 mb-4">
                    <div class="footer-widget">
                        <h4 class="mb-4 text-uppercase">Trường Mầm Non Little Sun</h4>
                        <div class="contact-info">
                            <p class="text-black">
                                <i class="bx bx-map me-2"></i>
                                <!-- Địa chỉ cần được cập nhật -->
                                Địa chỉ: 12 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, Hồ Chí Minh
                            </p>
                            <p class="text-black">
                                <i class="bx bx-phone me-2"></i>
                                Hotline: 0123 456 789
                            </p>
                            <!-- Thêm social media links -->
                            <div class="d-flex mt-3">
                                <a href="#" class="me-2 social-icon facebook">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                                <a href="#" class="me-2 social-icon tiktok">
                                    <i class="bx bxl-tiktok"></i>
                                </a>
                                <a href="#" class="social-icon youtube">
                                    <i class="bx bxl-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu Links -->
                <div class="col-lg-4 mb-4">
                    <div class="footer-widget">
                        <h4 class="mb-4 text-uppercase">Liên kết nhanh</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="footer-links">
                                    <li><a class=" fs-6" href="">Trang chủ</a></li>
                                    <li><a class=" fs-6" href="">Tuyển sinh</a></li>
                                    <li><a class=" fs-6" href="#">Lớp học</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="footer-widget">
                        <h4 class="mb-4 text-uppercase">Kết nối với chúng tôi</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="footer-links">
                                    <li><a class=" fs-6" href="#">Phụ huynh</a></li>
                                    <li><a class=" fs-6" href="#">Tin tức và sự kiện</a></li>
                                    <li><a class=" fs-6" href="">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center mb-0 text-black">
                            &copy; {{ date('Y') }} Little Sun. Đã đăng ký bản quyền.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    {{-- Bootstrap Script và Popper.js --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>