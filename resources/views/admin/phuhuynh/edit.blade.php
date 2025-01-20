@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chỉnh Sửa Phụ Huynh</h1>
        <a href="{{ route('admin.phuhuynh.show', $phuHuynh) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    {{-- Kiểm tra và hiển thị thông báo lỗi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông Tin Phụ Huynh</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.phuhuynh.update', $phuHuynh) }}" method="POST">
                {{-- Bảo vệ form khỏi các cuộc tấn công CSRF và xác định phương thức PUT cho form --}}
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Họ Tên</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name', optional($phuHuynh->user)->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="{{ old('email', optional($phuHuynh->user)->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" 
                           value="{{ old('phone', optional($phuHuynh->user)->phone) }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Địa Chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" 
                           value="{{ old('address', optional($phuHuynh->user)->address) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Lưu Thay Đổi
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
