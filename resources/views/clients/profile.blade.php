<x-client-layout>
{{-- Link to custom CSS --}}
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class='bx bx-user-circle me-2'></i>
                            Thông tin tài khoản
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Avatar Section -->
                            <div class="col-md-4 text-center border-end">
                                <div class="avatar-wrapper mb-4">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle profile-avatar" width="180">
                                    <div class="mt-3">
                                        <h4>{{ auth()->user()->name }}</h4>
                                        <p class="text-muted">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Profile Info Section -->
                            <div class="col-md-8">
                                <div class="row info-row">
                                    <label class="col-sm-3">
                                        <i class='bx bx-user me-2'></i>
                                        Họ và tên
                                    </label>
                                    <div class="col-sm-9">
                                        <p class="form-text">{{ auth()->user()->name }}</p>
                                    </div>
                                </div>

                                <div class="row info-row">
                                    <label class="col-sm-3">
                                        <i class='bx bx-envelope me-2'></i>
                                        Email
                                    </label>
                                    <div class="col-sm-9">
                                        <p class="form-text">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>

                                <div class="row info-row">
                                    <label class="col-sm-3">
                                        <i class='bx bx-shield-quarter me-2'></i>
                                        Vai trò
                                    </label>
                                    <div class="col-sm-9">
                                        <p class="form-text">{{ auth()->user()->role }}</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                            <i class='bx bx-edit me-1'></i>
                                            Chỉnh sửa thông tin
                                        </button>
                                        <button type="button" class="btn btn-primary btn-password" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                            <i class='bx bx-lock-alt me-1'></i>
                                            Đổi mật khẩu
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Chỉnh sửa thông tin -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa thông tin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Đổi mật khẩu -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đổi mật khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu hiện tại</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu mới</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</x-client-layout>