<x-admin-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-primary me-auto">
                            <i class="fas fa-edit me-2"></i>
                            Chỉnh sửa tin tức
                        </h5>
                        <a href="{{ route('admin.tintuc') }}" class="btn btn-primary">
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

                        <form action="{{ route('admin.tintuc.update', $tintuc->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="tieu_de" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('tieu_de') is-invalid @enderror" 
                                       id="tieu_de" 
                                       name="tieu_de" 
                                       value="{{ old('tieu_de', $tintuc->tieu_de) }}" 
                                       required>
                                @error('tieu_de')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="noi_dung" class="form-label">Nội dung <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('noi_dung') is-invalid @enderror" 
                                          id="noi_dung" 
                                          name="noi_dung" 
                                          rows="6" 
                                          required>{{ old('noi_dung', $tintuc->noi_dung) }}</textarea>
                                @error('noi_dung')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ngay_dang" class="form-label">Ngày đăng <span class="text-danger">*</span></label>
                                <input type="date" 
                                       class="form-control @error('ngay_dang') is-invalid @enderror" 
                                       id="ngay_dang" 
                                       name="ngay_dang" 
                                       value="{{ old('ngay_dang', date('Y-m-d', strtotime($tintuc->ngay_dang))) }}" 
                                       required>
                                @error('ngay_dang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>
                                    Cập nhật tin tức
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
