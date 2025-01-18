<x-admin-layout>
    {{-- Link to custom CSS --}}
    <link href="{{ asset('css/sukien_detail.css') }}" rel="stylesheet">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-primary me-auto">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Quản lý sự kiện
                        </h5>
                        <a href="{{ route('admin.sukien.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Thêm sự kiện mới
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <form action="{{ route('admin.sukien') }}" method="GET" class="filter-container">
                                    <label class="filter-label">Lọc theo trạng thái:</label>
                                    <select name="trang_thai" class="status-filter" onchange="this.form.submit()">
                                        <option value="">-- Tất cả trạng thái --</option>
                                        <option value="Sắp diễn ra" {{ request('trang_thai') == 'Sắp diễn ra' ? 'selected' : '' }}>Sắp diễn ra</option>
                                        <option value="Đang diễn ra" {{ request('trang_thai') == 'Đang diễn ra' ? 'selected' : '' }}>Đang diễn ra</option>
                                        <option value="Đã kết thúc" {{ request('trang_thai') == 'Đã kết thúc' ? 'selected' : '' }}>Đã kết thúc</option>
                                    </select>
                                </form>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">STT</th>
                                        <th style="width: 50px">ID</th>
                                        <th>Tiêu đề</th>
                                        <th>Mô tả</th>
                                        <th>Ngày diễn ra</th>
                                        <th>Thời gian bắt đầu</th>
                                        <th>Thời gian kết thúc</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sukien as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tieu_de }}</td>
                                        <td>{{ Str::limit($item->mo_ta, 100) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($item->ngay_dien_ra)) }}</td>
                                        <td>{{ $item->thoi_gian_bat_dau }}</td>
                                        <td>{{ $item->thoi_gian_ket_thuc }}</td>
                                        <td>{{ $item->trang_thai }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.sukien.edit', $item->id) }}" 
                                                   class="btn btn-success btn-sm" 
                                                   title="Sửa">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.sukien.destroy', $item->id) }}" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger btn-sm" 
                                                            title="Xóa"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa sự kiện này?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Không có sự kiện nào</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-3">
                            {{ $sukien->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
