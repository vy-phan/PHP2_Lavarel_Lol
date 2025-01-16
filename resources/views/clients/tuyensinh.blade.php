<x-client-layout>
    
{{-- Link to custom CSS --}}
    <link href="{{ asset('css/tuyensinh.css') }}" rel="stylesheet">

    {{-- Background Decorations --}}
    <div class="decorations-container">
        {{-- Flowers with different animations --}}
        <i class='bx bxs-flower decoration flower-spin icon-huge' style="top: 5%; left: 5%"></i>
        <i class='bx bxs-flower-alt decoration flower-float icon-medium' style="top: 15%; right: 8%"></i>
        <i class='bx bx-spa decoration flower-wave icon-giant' style="top: 25%; left: 12%"></i>
        <i class='bx bxs-flower decoration flower-bounce icon-small' style="top: 35%; right: 15%"></i>
        <i class='bx bxs-flower-alt decoration flower-pulse icon-large' style="top: 45%; left: 18%"></i>
        <i class='bx bx-spa decoration flower-wave icon-giant' style="top: 55%; right: 10%"></i>
        <i class='bx bxs-flower decoration flower-orbit icon-huge' style="top: 65%; left: 8%"></i>
        <i class='bx bxs-flower-alt decoration flower-swing icon-giant' style="top: 75%; right: 12%"></i>

        {{-- Stars --}}
        <i class='bx bxs-star decoration star-spin icon-large' style="top: 10%; right: 20%"></i>
        <i class='bx bxs-star-half decoration star-pulse icon-huge' style="top: 30%; left: 25%"></i>
        <i class='bx bxs-star decoration star-spin icon-medium' style="top: 50%; right: 25%"></i>
        <i class='bx bxs-star decoration star-pulse icon-giant' style="top: 70%; left: 20%"></i>

        {{-- Hearts --}}
        <i class='bx bxs-heart decoration heart-float icon-tiny' style="top: 20%; left: 15%"></i>
        <i class='bx bxs-heart decoration heart-pulse icon-small' style="top: 40%; right: 18%"></i>
        <i class='bx bxs-heart decoration heart-float icon-medium' style="top: 60%; left: 22%"></i>

        {{-- Clouds --}}
        <i class='bx bx-cloud decoration cloud-float icon-huge' style="top: 15%; right: 15%"></i>
        <i class='bx bx-cloud decoration cloud-float icon-giant' style="top: 45%; left: 10%"></i>
        <i class='bx bx-cloud decoration cloud-float icon-large' style="top: 75%; right: 20%"></i>

        {{-- Suns --}}
        <i class='bx bx-sun decoration sun-spin icon-huge' style="top: 25%; right: 25%"></i>
        <i class='bx bx-sun decoration sun-spin icon-giant' style="top: 65%; left: 25%"></i>

        {{-- Extra decorative elements --}}
        <i class='bx bxs-star decoration star-pulse icon-tiny' style="top: 8%; left: 30%"></i>
        <i class='bx bxs-heart decoration heart-float icon-small' style="top: 18%; right: 35%"></i>
        <i class='bx bx-cloud decoration cloud-float icon-medium' style="top: 28%; left: 40%"></i>
        <i class='bx bxs-flower decoration flower-spin icon-large' style="top: 38%; right: 45%"></i>
        <i class='bx bxs-star-half decoration star-pulse icon-huge' style="top: 48%; left: 50%"></i>
        <i class='bx bx-spa decoration flower-wave icon-giant' style="top: 58%; right: 55%"></i>
        <i class='bx bxs-heart decoration heart-pulse icon-tiny' style="top: 68%; left: 60%"></i>
        <i class='bx bx-sun decoration sun-spin icon-small' style="top: 78%; right: 65%"></i>
        <i class='bx bxs-flower-alt decoration flower-orbit icon-medium' style="top: 88%; left: 70%"></i>
    </div>

    {{-- Chương trình giáo dục --}}
    <section class="py-5 position-relative">
        {{-- Section decorations --}}
        <i class='bx bxs-flower decoration flower-bounce flower-small' style="top: -10px; left: 20%"></i>
        <i class='bx bxs-star decoration star-decoration star-pulse' style="top: 30px; right: 25%"></i>
        <i class='bx bx-cloud decoration cloud-decoration cloud-float' style="bottom: 20px; left: 15%"></i>
        <div class="container">
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
    </section>

    {{-- Hoạt động ngoại khóa --}}
    <section class="bg-light py-5 position-relative">
        {{-- Section decorations --}}
        <i class='bx bxs-heart decoration heart-decoration heart-float' style="top: 20px; right: 20%"></i>
        <i class='bx bx-sun decoration sun-decoration' style="bottom: 30px; left: 18%"></i>
        <i class='bx bxs-star decoration star-decoration star-spin' style="top: 40%; right: 15%"></i>
        <div class="container">
            <h2 class="text-center text-danger fw-bold mb-4">HOẠT ĐỘNG NGOẠI KHÓA</h2>
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="activity-item text-center">
                        <i class='bx bx-swim fs-1 text-primary'></i>
                        <h5 class="mt-3">Bơi lội</h5>
                        <p>Phát triển thể chất và kỹ năng bơi an toàn</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="activity-item text-center">
                        <i class='bx bx-palette fs-1 text-primary'></i>
                        <h5 class="mt-3">Nghệ thuật</h5>
                        <p>Vẽ, nặn tạo hình, âm nhạc</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="activity-item text-center">
                        <i class='bx bx-football fs-1 text-primary'></i>
                        <h5 class="mt-3">Thể thao</h5>
                        <p>Yoga, thể dục nhịp điệu</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="activity-item text-center">
                        <i class='bx bx-world fs-1 text-primary'></i>
                        <h5 class="mt-3">Dã ngoại</h5>
                        <p>Tham quan, trải nghiệm thực tế</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Thông tin tuyển sinh --}}
    <section class="py-5 position-relative">
        {{-- Section decorations --}}
        <i class='bx bxs-flower decoration flower-wave' style="top: 20%; left: 5%"></i>
        <i class='bx bx-cloud decoration cloud-decoration cloud-float' style="top: 40%; right: 8%"></i>
        <i class='bx bxs-heart decoration heart-decoration heart-pulse' style="bottom: 25%; left: 12%"></i>
        <div class="container">
            <h2 class="text-center text-danger fw-bold mb-5">THÔNG TIN TUYỂN SINH 2024-2025</h2>

            {{-- Đối tượng và thời gian --}}
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100 info-card">
                        <div class="card-body">
                            <h4 class="card-title text-primary mb-4">Đối tượng tuyển sinh</h4>
                            <ul class="list-unstyled">
                                <li><i class='bx bx-check-circle text-success me-2'></i>Nhà trẻ: 18 - 36 tháng tuổi
                                </li>
                                <li><i class='bx bx-check-circle text-success me-2'></i>Mẫu giáo nhỡ: 3 - 4 tuổi</li>
                                <li><i class='bx bx-check-circle text-success me-2'></i>Mẫu giáo lớn: 4 - 5 tuổi</li>
                                <li><i class='bx bx-check-circle text-success me-2'></i>Mẫu giáo chồi: 5 - 6 tuổi</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100 info-card">
                        <div class="card-body">
                            <h4 class="card-title text-primary mb-4">Thời gian học</h4>
                            <ul class="list-unstyled">
                                <li><i class='bx bx-time text-primary me-2'></i>Sáng: 7:30 - 11:30</li>
                                <li><i class='bx bx-time text-primary me-2'></i>Chiều: 13:30 - 17:30</li>
                                <li><i class='bx bx-calendar text-primary me-2'></i>Từ thứ 2 đến thứ 6 hàng tuần</li>
                                <li><i class='bx bx-calendar-check text-primary me-2'></i>Nghỉ các ngày lễ theo quy
                                    định</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Học phí --}}
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body">
                    <h4 class="card-title text-primary mb-4">Học phí và các khoản phí</h4>
                    <div class="table-wrapper">
                        <table class="fees-table">
                            <thead>
                                <tr>
                                    <th>Khoản mục</th>
                                    <th>Nhà trẻ</th>
                                    <th>Mẫu giáo</th>
                                    <th>Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Học phí</td>
                                    <td>4,500,000đ</td>
                                    <td>5,000,000đ</td>
                                    <td>Đóng theo học kỳ</td>
                                </tr>
                                <tr>
                                    <td>Tiền ăn</td>
                                    <td>1,200,000đ</td>
                                    <td>1,200,000đ</td>
                                    <td>Đóng theo tháng</td>
                                </tr>
                                <tr>
                                    <td>Đưa đón</td>
                                    <td colspan="2" class="text-center">800,000đ/tháng</td>
                                    <td>Tùy chọn</td>
                                </tr>
                                <tr>
                                    <td>Ngoại khóa</td>
                                    <td colspan="2" class="text-center">500,000đ/môn</td>
                                    <td>Tùy chọn</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Hồ sơ nhập học --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-primary mb-4">Hồ sơ nhập học</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-3">Giấy tờ cần thiết:</h5>
                            <ul class="list-unstyled">
                                <li><i class='bx bx-file text-danger me-2'></i>Đơn đăng ký nhập học (theo mẫu)</li>
                                <li><i class='bx bx-file text-danger me-2'></i>Bản sao giấy khai sinh</li>
                                <li><i class='bx bx-file text-danger me-2'></i>Bản sao sổ hộ khẩu</li>
                                <li><i class='bx bx-file text-danger me-2'></i>4 ảnh 3x4 cm</li>
                                <li><i class='bx bx-file text-danger me-2'></i>Sổ theo dõi tiêm chủng</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-3">Quy trình nhập học:</h5>
                            <ul class="list-unstyled">
                                <li><i class='bx bx-right-arrow-alt text-primary me-2'></i>Liên hệ đăng ký</li>
                                <li><i class='bx bx-right-arrow-alt text-primary me-2'></i>Tham quan trường</li>
                                <li><i class='bx bx-right-arrow-alt text-primary me-2'></i>Nộp hồ sơ và đóng học phí
                                </li>
                                <li><i class='bx bx-right-arrow-alt text-primary me-2'></i>Nhận lịch học và sách</li>
                                <li><i class='bx bx-right-arrow-alt text-primary me-2'></i>Bắt đầu nhập học</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Form đăng ký --}}
    <section class="bg-light py-5 position-relative">
        {{-- Section decorations --}}
        <i class='bx bxs-star decoration star-decoration star-pulse' style="top: 15%; right: 10%"></i>
        <i class='bx bxs-flower decoration flower-orbit' style="bottom: 20%; left: 8%"></i>
        <i class='bx bx-sun decoration sun-decoration' style="top: 50%; right: 15%"></i>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card shadow" id="registration-form">
                        <div class="card-body p-5">
                            <h3 class="text-center text-danger mb-4 fw-bold">ĐĂNG KÝ NHẬP HỌC</h3>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action='{{ route('tuyensinh.store') }}#registration-form' method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Họ tên phụ huynh <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="phuhuynh_name" value="{{ old('phuhuynh_name') }}"
                                        class="form-control @error('phuhuynh_name') is-invalid @enderror"
                                        id="fullname" placeholder="Nhập họ và tên phụ huynh">
                                    @error('phuhuynh_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại <span
                                            class="text-danger">*</span></label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid
                                        @enderror"
                                        id="phone" placeholder="Nhập số điện thoại phụ huynh">
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Nhập email phụ huynh">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                                    <input type="address" name="address" value="{{ old('address') }}"
                                        class="form-control @error('address') is-invalid @enderror"
                                        id="address" placeholder="Nhập địa chỉ phụ huynh">
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="child_name" class="form-label">Họ tên bé <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="child_name" value="{{ old('child_name') }}"
                                        class="form-control @error('child_name') is-invalid @enderror"
                                        id="child_name" placeholder="Nhập họ và tên bé">
                                    @error('child_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="child_birth_date" class="form-label">Ngày sinh của bé <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="child_birth_date"
                                        value="{{ old('child_birth_date') }}"
                                        class="form-control @error('child_birth_date') is-invalid @enderror"
                                        id="child_birth_date">
                                    @error('child_birth_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="child_gender" class="form-label">Chọn giới tính <span
                                            class="text-danger">*</span></label>
                                    <select name="child_gender" class="form-select @error('child_gender') is-invalid @enderror">
                                        <option value="">Chọn giới tính</option>
                                        <option value="male" {{ old('child_gender') == 'male' ? 'selected' : '' }}>Nam</option>
                                        <option value="female" {{ old('child_gender') == 'female' ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                    @error('child_gender')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="class_registered" class="form-label">Lớp đăng ký <span
                                            class="text-danger">*</span></label>
                                    <select name="class_registered" class="form-select @error('class_registered') is-invalid @enderror">
                                        <option value="">Chọn lớp</option>
                                        <option value="nha_tre" {{ old('class_registered') == 'nha_tre' ? 'selected' : '' }}>Nhà trẻ (18-36 tháng)</option>
                                        <option value="mau_giao_nho" {{ old('class_registered') == 'mau_giao_nho' ? 'selected' : '' }}>Mẫu giáo nhỡ (3-4 tuổi)</option>
                                        <option value="mau_giao_lon" {{ old('class_registered') == 'mau_giao_lon' ? 'selected' : '' }}>Mẫu giáo lớn (4-5 tuổi)</option>
                                        <option value="mau_giao_choi" {{ old('class_registered') == 'mau_giao_choi' ? 'selected' : '' }}>Mẫu giáo chồi (5-6 tuổi)</option>
                                    </select>
                                    @error('class_registered')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Ghi chú thêm</label>
                                    <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-danger px-5">Gửi đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($errors->any())
        <script>
            // Tự động cuộn đến form khi có lỗi
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('registration-form');
                if (form) {
                    form.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        </script>
    @endif

</x-client-layout>