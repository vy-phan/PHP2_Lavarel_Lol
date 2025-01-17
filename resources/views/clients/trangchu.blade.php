@extends('layout.client')
    
{{-- Link to custom CSS --}}
<link href="{{ asset('css/trangchu.css') }}" rel="stylesheet">

@section('content')
{{-- Carousel --}}
<div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/Frame-13.png" class="d-block w-100"
                alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/Frame-13-1.png"
                class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

{{-- Về chúng tôi --}}
<div class="container-fluid py-5">
    <h2 class="text-danger fw-bold text-center mb-5">VỀ CHÚNG TÔI</h2>
    <div class="row">
        <!-- Left sidebar menu -->
        <div class="col-lg-3 col-md-4 mb-4">
            <div class="list-group shadow-sm">
                <a href="#" class="list-group-item list-group-item-action bg-danger text-white fw-bold"
                    data-content="vision">
                    TẦM NHÌN
                </a>
                <a href="#" class="list-group-item list-group-item-action text-danger fw-bold"
                    data-content="mission">
                    SỨ MỆNH
                </a>
                <a href="#" class="list-group-item list-group-item-action text-danger fw-bold"
                    data-content="values">
                    GIÁ TRỊ CỐT LÕI
                </a>
                <a href="#" class="list-group-item list-group-item-action text-danger fw-bold"
                    data-content="team">
                    ĐỘI NGŨ
                </a>
                <a href="#" class="list-group-item list-group-item-action text-danger fw-bold"
                    data-content="method">
                    PHƯƠNG PHÁP GIÁO DỤC
                </a>
                <a href="#" class="list-group-item list-group-item-action text-danger fw-bold"
                    data-content="letter">
                    THƯ NGỎ
                </a>
            </div>
        </div>

        <!-- Right content area -->
        <div class="col-lg-9 col-md-8">
            <!-- Vision content (default) -->
            <div class="content-section active" id="vision">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-md-7">
                                <img src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/z3473410709752_051cde59099aa3539c206ad7759a68dc-1400x788.jpg"
                                    alt="Khu vui chơi STEAMe GARTEN" class="img-fluid rounded-start h-100 w-100"
                                    style="object-fit: cover;">
                            </div>
                            <div class="col-md-5 p-4">
                                <h4 class="text-danger mb-3">Môi trường học tập hiện đại</h4>
                                <p class="text-justify mb-4">
                                    Hệ thống trường mầm non STEAMe GARTEN tự hào có đội ngũ giáo viên nước ngoài và
                                    Việt Nam chuyên môn cao, nhiều kinh nghiệm, tận tâm, năng động, và thiết tha yêu
                                    trẻ. Với mục tiêu trở thành gia đình thứ hai của bé, Hệ thống trường mầm non
                                    STEAMe GARTEN không...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mission content -->
            <div class="content-section d-none" id="mission">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="text-danger mb-4">Sứ mệnh của chúng tôi</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="mission-item bg-light p-4 rounded">
                                    <i class="fas fa-child text-danger fs-2 mb-3"></i>
                                    <h5 class="mb-3">Phát triển toàn diện</h5>
                                    <p>Xây dựng môi trường giáo dục tốt nhất để phát triển toàn diện các kỹ năng cho
                                        trẻ.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="mission-item bg-light p-4 rounded">
                                    <i class="fas fa-heart text-danger fs-2 mb-3"></i>
                                    <h5 class="mb-3">Yêu thương và quan tâm</h5>
                                    <p>Mang đến sự chăm sóc đầy yêu thương và quan tâm như một gia đình thứ hai của
                                        trẻ.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Values content -->
            <div class="content-section d-none" id="values">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="text-danger mb-4">Giá trị cốt lõi</h4>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="value-item text-center">
                                    <div class="value-icon bg-light d-flex align-items-center justify-content-center rounded-circle p-4 mx-auto mb-3"
                                        style="width: 100px; height: 100px;">
                                        <i class="bx bxs-brain text-danger fs-1"></i>
                                    </div>
                                    <h5 class="mb-3">Sáng tạo</h5>
                                    <p>Khuyến khích tư duy sáng tạo và phát triển tiềm năng của từng trẻ</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="value-item text-center">
                                    <div class="value-icon bg-light d-flex align-items-center justify-content-center rounded-circle p-4 mx-auto mb-3"
                                        style="width: 100px; height: 100px;">
                                        <i class="bx bx-heart-circle text-danger fs-1"></i>
                                    </div>
                                    <h5 class="mb-3">Tận tâm</h5>
                                    <p>Cam kết mang đến sự chăm sóc và giáo dục tốt nhất cho mọi trẻ</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="value-item text-center">
                                    <div class="value-icon bg-light d-flex align-items-center justify-content-center rounded-circle p-4 mx-auto mb-3"
                                        style="width: 100px; height: 100px;">
                                        <i class="bx bxs-shield-plus text-danger fs-1"></i>
                                    </div>
                                    <h5 class="mb-3">An toàn</h5>
                                    <p>Đảm bảo môi trường học tập an toàn và lành mạnh cho trẻ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team content -->
            <div class="content-section d-none" id="team">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="text-danger mb-4">Đội ngũ giáo viên</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="team-item d-flex align-items-center bg-light p-4 rounded">
                                    <div class="flex-shrink-0">
                                        <img src="../images/1.jpg" alt="Giáo viên" class="rounded-circle"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="ms-4">
                                        <h5 class="mb-1">Giáo viên nước ngoài</h5>
                                        <p class="text-muted mb-2">Chuyên môn cao</p>
                                        <p class="mb-0">Đội ngũ giáo viên nước ngoài giàu kinh nghiệm, nhiệt tình
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="team-item d-flex align-items-center bg-light p-4 rounded">
                                    <div class="flex-shrink-0">
                                        <img src="../images/users/pic2.jpg" alt="Giáo viên"
                                            class="rounded-circle"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="ms-4">
                                        <h5 class="mb-1">Giáo viên Việt Nam</h5>
                                        <p class="text-muted mb-2">Tận tâm, yêu trẻ</p>
                                        <p class="mb-0">Đội ngũ giáo viên Việt Nam được đào tạo bài bản, yêu nghề
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Method content -->
            <div class="content-section d-none" id="method">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="text-danger mb-4">Phương pháp giáo dục</h4>
                        <div class="method-content">
                            <div class="row align-items-center mb-4">
                                <div class="col-md-6">
                                    <img src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/1-768x432.jpg"
                                        alt="Phương pháp giáo dục" class="img-fluid rounded mb-3 mb-md-0">
                                </div>
                                <div class="col-md-6">
                                    <h5 class="mb-3">Phương pháp STEAM</h5>
                                    <p>Áp dụng phương pháp giáo dục STEAM hiện đại, kết hợp:</p>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-check text-danger me-2"></i>Science (Khoa học)</li>
                                        <li><i class="fas fa-check text-danger me-2"></i>Technology (Công nghệ)
                                        </li>
                                        <li><i class="fas fa-check text-danger me-2"></i>Engineering (Kỹ thuật)
                                        </li>
                                        <li><i class="fas fa-check text-danger me-2"></i>Arts (Nghệ thuật)</li>
                                        <li><i class="fas fa-check text-danger me-2"></i>Mathematics (Toán học)
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Letter content -->
            <div class="content-section d-none" id="letter">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="letter-content">
                            <div class="row">
                                <div class="col-12">
                                    <div class="letter-box bg-light p-4 rounded">
                                        <i class="fas fa-quote-left text-danger fs-2 mb-3"></i>
                                        <p class="mb-4">
                                            Kính gửi Quý phụ huynh,<br><br>
                                            Trường mầm non STEAMe GARTEN xin gửi lời chào trân trọng đến Quý phụ
                                            huynh. Chúng tôi hiểu rằng việc lựa chọn môi trường giáo dục tốt nhất
                                            cho con em là điều vô cùng quan trọng đối với mỗi gia đình.
                                        </p>
                                        <p class="mb-4">
                                            Với đội ngũ giáo viên giàu kinh nghiệm, cơ sở vật chất hiện đại và
                                            phương pháp giáo dục tiên tiến, chúng tôi cam kết sẽ tạo nên một môi
                                            trường học tập và phát triển toàn diện cho trẻ.
                                        </p>
                                        <p class="mb-0">
                                            Hãy đến tham quan và trải nghiệm để cảm nhận không gian giáo dục đầy
                                            tình yêu thương tại STEAMe GARTEN.
                                        </p>
                                        <div class="text-end mt-4">
                                            <p class="mb-0"><strong>Ban Giám Hiệu</strong></p>
                                            <p class="text-danger">Trường Mầm Non STEAMe GARTEN</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chương trình giáo dục --}}
<div class="container-fluid bg-light py-5">
    <h2 class="text-center text-danger fw-bold mb-5">CHƯƠNG TRÌNH GIÁO DỤC</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm program-card">
                <div class="overflow-hidden">
                    <img src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/Frame-13.png"
                        class="card-img-top" alt="Montessori">
                </div>
                <div class="card-body">
                    <h4 class="card-title text-primary">Phương pháp Montessori</h4>
                    <p class="card-text">
                        - Phát triển tự nhiên theo từng giai đoạn<br>
                        - Môi trường học tập được chuẩn bị kỹ lưỡng<br>
                        - Tôn trọng sự độc lập và tự do của trẻ<br>
                        - Phát triển giác quan và vận động tinh
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm program-card">
                <div class="overflow-hidden">
                    <img src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/Frame-13-1.png"
                        class="card-img-top" alt="STEM">
                </div>
                <div class="card-body">
                    <h4 class="card-title text-primary">Giáo dục STEM</h4>
                    <p class="card-text">
                        - Tích hợp Khoa học, Công nghệ, Kỹ thuật và Toán học<br>
                        - Học thông qua trải nghiệm thực tế<br>
                        - Phát triển tư duy logic và sáng tạo<br>
                        - Kỹ năng giải quyết vấn đề
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm program-card">
                <div class="overflow-hidden">
                    <img src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/Frame-13.png"
                        class="card-img-top" alt="Reggio Emilia">
                </div>
                <div class="card-body">
                    <h4 class="card-title text-primary">Phương pháp Reggio Emilia</h4>
                    <p class="card-text">
                        - Học thông qua dự án và khám phá<br>
                        - Phát triển ngôn ngữ và nghệ thuật<br>
                        - Tương tác xã hội và làm việc nhóm<br>
                        - Ghi chép và theo dõi quá trình phát triển
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Cơ sở vật chất --}}
<div class="container-fluid cosovc my-4 text-center text-white">
    <p class="fst-italic fw-bold pt-3"><i class='bx bx-minus'></i> Cơ sở vật chất
        <i class='bx bx-minus'></i>
    </p>
    <h3 class="mb-4 text-uppercase fw-bold">Cơ sở vật chất</h3>
    <div class="owl-carousel pb-5">
        <div class="border">
            <img src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/z3473410714549_488463737c6ae0d1216e703a85b91067.jpg"
                alt="" />
        </div>
        <div class="border"><img
                src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/z3473410704109_8c9320e180feb8e6da4f4f10e651a7b1.jpg"
                alt="" /></div>
        <div class="border"><img
                src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/z3473414065541_3ca60af4dd3cbbde72b0506ca2c1135e-768x432.jpg"
                alt="" /></div>
        <div class="border">
            <img src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/1-1400x788.jpg" alt="" />
        </div>
        <div class="border"><img src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/3-1400x788.jpg"
                alt="" /></div>
        <div class="border"><img
                src="https://mamnon2.maugiaodien.com/wp-content/uploads/2022/06/z3473410709752_051cde59099aa3539c206ad7759a68dc-1400x788.jpg"
                alt="" /></div>
    </div>
</div>

{{-- Quy trình tuyển sinh --}}
<div class="container text-center my-5">
    <p class="text-danger fst-italic fw-bold"><i class='bx bx-minus'></i> Tuyển sinh các em từ 12 tháng đến 6 tuổi
        <i class='bx bx-minus'></i>
    </p>
    <h3 class="mb-4 text-uppercase fw-bold">Quy Trình Tuyển Sinh</h3>
    <div class="row">
        <div class="col-md-3 process-step">
            <div class="process-icon">1</div>
            <h5>Tư vấn tuyển sinh</h5>
            <p>Phụ huynh học sinh liên hệ với nhân viên tuyển sinh để tư vấn về những thông tin về chương trình học
            </p>
        </div>
        <div class="col-md-3 process-step">
            <div class="process-icon">2</div>
            <h5>Đăng ký ghi danh</h5>
            <p>Phụ huynh học sinh liên hệ với nhân viên tuyển sinh để tư vấn về những thông tin về chương trình học
            </p>
        </div>
        <div class="col-md-3 process-step">
            <div class="process-icon">3</div>
            <h5>Hoàn thiện hồ sơ nhập học</h5>
            <p>Phụ huynh học sinh liên hệ với nhân viên tuyển sinh để tư vấn về những thông tin về chương trình học
            </p>
        </div>
        <div class="col-md-3 process-step">
            <div class="process-icon">4</div>
            <h5>Hoàn thiện học phí</h5>
            <p>Phụ huynh học sinh liên hệ với nhân viên tuyển sinh để tư vấn về những thông tin về chương trình học
            </p>
        </div>
    </div>
    <a class="btn btn-custom mt-4" href="{{ route('tuyensinh') }}">Xem Chi Tiết</a>
</div>

<script>
    $(document).ready(function() {
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1500,
            autoplayHoverPause: true,
            dotsEach: true,
        });
        $(".play").on("click", function() {
            owl.trigger("play.owl.autoplay", [1000]);
        });
        $(".stop").on("click", function() {
            owl.trigger("stop.owl.autoplay");
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.list-group-item');
        const contentSections = document.querySelectorAll('.content-section');

        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all menu items
                menuItems.forEach(mi => {
                    mi.classList.remove('bg-danger', 'text-white');
                    mi.classList.add('text-danger');
                });

                // Add active class to clicked menu item
                this.classList.remove('text-danger');
                this.classList.add('bg-danger', 'text-white');

                // Hide all content sections
                contentSections.forEach(section => {
                    section.classList.add('d-none');
                });

                // Show selected content section
                const contentId = this.getAttribute('data-content');
                const selectedContent = document.getElementById(contentId);
                if (selectedContent) {
                    selectedContent.classList.remove('d-none');
                }
            });
        });
    });
</script>


@endsection
