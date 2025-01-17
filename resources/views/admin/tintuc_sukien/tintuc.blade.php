<x-admin-layout>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <!-- Card thống kê tin tức -->
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-primary" style="font-weight: bold;">
                        <i class="fas fa-newspaper me-2"></i>
                        Tổng số tin tức
                    </h5>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <h3 class="mb-0">{{ $tintuc->total() }}</h3>
                        <p class="fs-4">Tin tức</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danh sách tin tức -->
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 text-primary" style="font-weight: bold;">
                        <i class="fas fa-list me-2"></i>
                        Danh sách tin tức
                    </h5>
                    <a href="{{ route('admin.tintuc.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Thêm tin tức mới
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px">STT</th>
                                    <th style="width: 50px">ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th style="width: 120px">Ngày đăng</th>
                                    <th style="width: 100px">Người đăng</th>
                                    <th style="width: 120px">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tintuc as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tieu_de }}</td>
                                    <td>{{ Str::limit($item->noi_dung, 100) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->ngay_dang)) }}</td>
                                    <td>{{ $item->user->name ?? 'N/A' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.tintuc.edit', $item->id) }}" 
                                               class="btn btn-success btn-sm" 
                                               title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.tintuc.destroy', $item->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm" 
                                                        title="Xóa"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Không có tin tức nào</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $tintuc->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>