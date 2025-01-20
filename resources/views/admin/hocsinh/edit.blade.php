@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chỉnh Sửa Học Sinh</h1>
        <a href="{{ route('admin.hocsinh.show', $hocSinh) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

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
            <h6 class="m-0 font-weight-bold text-primary">Thông Tin Học Sinh</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.hocsinh.update', $hocSinh) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Họ Tên</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name', $hocSinh->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="birth_date">Ngày Sinh</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" 
                           value="{{ old('birth_date', $hocSinh->birth_date->format('Y-m-d')) }}" required>
                </div>

                <div class="form-group">
                    <label for="gioi_tinh">Giới Tính</label>
                    <select class="form-control" id="gioi_tinh" name="gioi_tinh" required>
                        <option value="Nam" {{ old('gioi_tinh', $hocSinh->gioi_tinh) == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('gioi_tinh', $hocSinh->gioi_tinh) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dia_chi">Địa Chỉ</label>
                    <input type="text" class="form-control" id="dia_chi" name="dia_chi" 
                           value="{{ old('dia_chi', $hocSinh->dia_chi) }}" required>
                </div>

                <div class="form-group">
                    <label for="lop_hoc_id">Lớp</label>
                    <select class="form-control" id="lop_hoc_id" name="lop_hoc_id">
                        <option value="">Chọn lớp</option>
                        @foreach($lopHoc as $lop)
                            <option value="{{ $lop->id }}" {{ old('lop_hoc_id', $hocSinh->lop_hoc_id) == $lop->id ? 'selected' : '' }}>
                                {{ $lop->ten_lop }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Lưu Thay Đổi
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
