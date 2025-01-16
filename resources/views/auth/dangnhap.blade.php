<x-client-layout>
    {{-- Link to custom CSS --}}
    <link href="{{ asset('css/dangnhap.css') }}" rel="stylesheet">
    <div class="vh-100 d-flex justify-content-center align-items-center login-background">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card glass-effect border-0 shadow">
                        <div class="card-body p-5">
                            <div class="text-center mb-4 d-flex justify-content-center align-items-center">
                                <img src="images/logos/logo_mamnon.png" alt="Logo" class="img-fluid"
                                    style="max-width: 120px;">
                            </div>
                            <h4 class="text-center mb-4 fw-bold text-dark">Đăng nhập vào tài khoản</h4>
                            <form action="{{ route('dangnhap') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email')                                       
                                    @enderror"
                                        id="email" placeholder="Nhập email của bạn">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label fw-bold">Mật khẩu</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password')                                       
                                    @enderror"
                                        id="password" placeholder="Nhập mật khẩu của bạn">

                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                        <label class="form-check-label text-dark" for="remember">Ghi nhớ đăng
                                            nhập</label>
                                    </div>
                                    <a href="page-forgot-password.html" class="text-decoration-none text-primary">Quên
                                        mật khẩu?</a>
                                </div>

                                @error('failed')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Đăng nhập</button>
                                </div>
                            </form>
                            <div class="text-center mt-4">
                                <p class="text-dark">Bạn chưa có tài khoản?
                                    <a href="{{ route('dangky.show') }}" class="text-decoration-none text-primary fw-bold">Đăng
                                        ký
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-client-layout>
