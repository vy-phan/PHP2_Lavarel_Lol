@extends('layout.client')

@section('content')
{{-- Link to custom CSS --}}
<link href="{{ asset('css/dangky.css') }}" rel="stylesheet">
<div class="login-background">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card glass-effect border-0 shadow">
                    <div class="card-body p-5">
                        <div class="text-center mb-4 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/logos/logo_mamnon.png') }}" alt="Logo" class="img-fluid" style="max-width: 120px;">
                        </div>
                        <h4 class="text-center mb-4 fw-bold text-dark">Đăng ký tài khoản</h4>
                        <form action="{{ route('dangky') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold">Họ và tên</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Nhập họ và tên của bạn">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Nhập email của bạn">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-bold">Mật khẩu</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password" placeholder="Nhập mật khẩu của bạn">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-bold">Xác nhận mật khẩu</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control"
                                    id="password_confirmation" placeholder="Nhập lại mật khẩu của bạn">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">Đăng ký</button>
                            <div class="text-center">
                                <p>Bạn đã có tài khoản? <a href="{{ route('dangnhap.show') }}" class="text-primary text-decoration-none text-bold">Đăng nhập ngay</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection