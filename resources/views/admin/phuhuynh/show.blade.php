@extends('layout.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Chi Tiết Phụ Huynh</h1>
            <a href="{{ route('admin.phuhuynh.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        {{-- Kiểm tra thông báo --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xl-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông Tin Phụ Huynh</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                {{-- optional($phuHuynh->user) dùng để tránh lỗi user không tồn tại --}}
                                <tr>
                                    <th>Họ Tên:</th>
                                    <td>{{ optional($phuHuynh->user)->name ?? 'Chưa có' }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ optional($phuHuynh->user)->email ?? 'Chưa có' }}</td>
                                </tr>
                                <tr>
                                    <th>Số Điện Thoại:</th>
                                    <td>{{ optional($phuHuynh->user)->phone ?? 'Chưa có' }}</td>
                                </tr>
                                <tr>
                                    <th>Ngày Tạo:</th>
                                    {{-- Hiển thị theo định dạng DD/mm/YYYY H:i:s --}}
                                    <td>{{ $phuHuynh->created_at->format('d/m/Y H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Danh Sách Con</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Họ Tên</th>
                                        <th>Ngày Sinh</th>
                                        <th>Giới Tính</th>
                                        <th>Lớp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Lặp qua danh sách Treem liên quan đến Phuhuynh đẻ hiển thị thông tin trẻ em  --}}
                                    @foreach ($phuHuynh->treEm as $treEm)
                                        <tr>
                                            <td>{{ $treEm->name }}</td>
                                            <td>{{ $treEm->birth_date->format('d/m/Y') }}</td>
                                            <td>{{ $treEm->gioi_tinh }}</td>
                                            <td>{{ optional($treEm->lopHoc)->ten_lop ?? 'Chưa phân lớp' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
