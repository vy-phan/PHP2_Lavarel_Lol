<x-admin-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-primary me-auto">
                            <i class="fas fa-edit me-2"></i>
                            Chỉnh sửa sự kiện
                        </h5>
                        <a href="{{ route('admin.sukien') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-2"></i>
                            Quay lại
                        </a>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.sukien.update', $sukien->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="tieu_de" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('tieu_de') is-invalid @enderror" 
                                       id="tieu_de" 
                                       name="tieu_de" 
                                       value="{{ old('tieu_de', $sukien->tieu_de) }}" 
                                       required>
                                @error('tieu_de')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="mo_ta" class="form-label">Mô tả <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('mo_ta') is-invalid @enderror" 
                                          id="mo_ta" 
                                          name="mo_ta" 
                                          rows="4" 
                                          required>{{ old('mo_ta', $sukien->mo_ta) }}</textarea>
                                @error('mo_ta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ngay_dien_ra" class="form-label">Ngày diễn ra <span class="text-danger">*</span></label>
                                <input type="date" 
                                       class="form-control @error('ngay_dien_ra') is-invalid @enderror" 
                                       id="ngay_dien_ra" 
                                       name="ngay_dien_ra" 
                                       value="{{ old('ngay_dien_ra', date('Y-m-d', strtotime($sukien->ngay_dien_ra))) }}" 
                                       required>
                                @error('ngay_dien_ra')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="thoi_gian_bat_dau" class="form-label">Thời gian bắt đầu <span class="text-danger">*</span></label>
                                        <input type="time" 
                                               class="form-control @error('thoi_gian_bat_dau') is-invalid @enderror" 
                                               id="thoi_gian_bat_dau" 
                                               name="thoi_gian_bat_dau" 
                                               value="{{ old('thoi_gian_bat_dau', $sukien->thoi_gian_bat_dau) }}" 
                                               required>
                                        @error('thoi_gian_bat_dau')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="thoi_gian_ket_thuc" class="form-label">Thời gian kết thúc <span class="text-danger">*</span></label>
                                        <input type="time" 
                                               class="form-control @error('thoi_gian_ket_thuc') is-invalid @enderror" 
                                               id="thoi_gian_ket_thuc" 
                                               name="thoi_gian_ket_thuc" 
                                               value="{{ old('thoi_gian_ket_thuc', $sukien->thoi_gian_ket_thuc) }}" 
                                               required>
                                        @error('thoi_gian_ket_thuc')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="trang_thai" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                                <select class="form-select @error('trang_thai') is-invalid @enderror" 
                                        id="trang_thai" 
                                        name="trang_thai" 
                                        required>
                                    <option value="">Chọn trạng thái</option>
                                    <option value="Sắp diễn ra" {{ old('trang_thai', $sukien->trang_thai) == 'Sắp diễn ra' ? 'selected' : '' }}>Sắp diễn ra</option>
                                    <option value="Đang diễn ra" {{ old('trang_thai', $sukien->trang_thai) == 'Đang diễn ra' ? 'selected' : '' }}>Đang diễn ra</option>
                                    <option value="Đã kết thúc" {{ old('trang_thai', $sukien->trang_thai) == 'Đã kết thúc' ? 'selected' : '' }}>Đã kết thúc</option>
                                </select>
                                @error('trang_thai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>
                                    Cập nhật sự kiện
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
