@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chi Tiết Học Sinh</h1>
        <a href="{{ route('admin.hocsinh.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông Tin Học Sinh</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Họ Tên:</th>
                                <td>{{ $hocSinh->name }}</td>
                            </tr>
                            <tr>
                                <th>Ngày Sinh:</th>
                                <td>{{ $hocSinh->birth_date->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>Giới Tính:</th>
                                <td>{{ $hocSinh->gioi_tinh }}</td>
                            </tr>
                            <tr>
                                <th>Địa Chỉ:</th>
                                <td>{{ $hocSinh->dia_chi }}</td>
                            </tr>
                            <tr>
                                <th>Lớp:</th>
                                <td>{{ optional($hocSinh->lopHoc)->ten_lop ?? 'Chưa phân lớp' }}</td>
                            </tr>
                            <tr>
                                <th>Ngày Tạo:</th>
                                <td>{{ $hocSinh->created_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông Tin Phụ Huynh</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Họ Tên:</th>
                                <td>{{ optional($hocSinh->phuHuynh->user)->name ?? 'Không có' }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ optional($hocSinh->phuHuynh->user)->email ?? 'Không có' }}</td>
                            </tr>
                            <tr>
                                <th>Số Điện Thoại:</th>
                                <td>{{ optional($hocSinh->phuHuynh->user)->phone ?? 'Không có' }}</td>
                            </tr>
                            <tr>
                                <th>Địa Chỉ:</th>
                                <td>{{ optional($hocSinh->phuHuynh->user)->address ?? 'Không có' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
