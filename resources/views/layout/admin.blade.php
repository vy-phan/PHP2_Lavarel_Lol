<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quản trị - Trường Mầm Non</title>

    <!-- CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1234567890.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{route('client.trangchu')}}" class="brand-logo d-flex align-items-center">
                <img class="logo-abbr me-2" width="50" height="50" src="{{ asset('images/logos/logo_mamnon.png') }}" alt="Logo trường">
                <div class="brand-title">
                    <h4 class="mb-0 text-primary">Little Sun</h4>
                    <h5 class="text-black">Kindergarten</h5>
                </div>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="input-group search-area right d-lg-inline-flex d-none">
                                <input type="text" class="form-control" placeholder="Nhập nội dung tìm kiếm...">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <a href="javascript:void(0);">
                                            <i class="flaticon-381-search-2"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right main-notification">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="{{ asset('images/1.jpg') }}" width="20" alt="">
                                    <div class="header-info">
                                        <span>Văn Khoa</span>
                                        <small class="text-center">Admin</small>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="#" class="dropdown-item ai-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Đăng xuất</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('dangxuat') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <div class="main-profile">
                    <div class="image-bx">
                        <img src="{{ asset('images/1.jpg') }}" alt="">
                        <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    </div>
                    <h5 class="name"><span class="font-w400">Xin chào,</span> Admin</h5>
                </div>
                <ul class="metismenu" id="menu">
                    <li><a href="{{ route('admin.quanlytaikhoan') }}">
                            <i class="fas fa-user"></i>
                            <span class="nav-text">Quản lý tài khoản</span>
                        </a>
                    </li>

                    <li><a href="{{ route('admin.tuyensinh') }}">
                            <i class="fas fa-user-plus"></i>
                            <span class="nav-text">Quản lý tuyển sinh</span>
                        </a>
                    </li>

                    <li><a aria-expanded="false">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span class="nav-text">Quản lý giáo viên</span>
                        </a>
                    </li>

                    <li><a aria-expanded="false">
                            <i class="fas fa-user-friends"></i>
                            <span class="nav-text">Quản lý phụ huynh</span>
                        </a>
                    </li>

                    <li><a aria-expanded="false">
                            <i class="fas fa-user-graduate"></i>
                            <span class="nav-text">Quản lý học sinh</span>
                        </a>
                    </li>

                    <li><a aria-expanded="false">
                            <i class="fas fa-school"></i>
                            <span class="nav-text">Quản lý lớp học</span>
                        </a>
                    </li>

                    <li><a aria-expanded="false">
                            <i class="fas fa-box"></i>
                            <span class="nav-text">Quản lý vật chất</span>
                        </a>
                    </li>
                    <li><a aria-expanded="false" href="{{ route('admin.phanhoi') }}">
                            <i class="fas fa-newspaper"></i>
                            <span class="nav-text">Quản lý phản hồi</span>
                        </a>
                    </li>
                    <li>
                        <a aria-expanded="false">
                            <i class="fas fa-newspaper"></i>
                            <span class="nav-text">Quản lý tin tức</span>
                        </a>
                    </li>
                </ul>
                <div class="copyright">
                    <hr>
                    <p> 2025 All Rights Reserved</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" style="padding-top: 60px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar" class="app-fullcalendar">
                                    <main>
                                        {{$slot}}
                                    </main>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p> {{ date('Y') }} Little Sun. Đã đăng ký bản quyền.
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <!-- JavaScript -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
</body>

</html>