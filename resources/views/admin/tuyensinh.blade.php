<x-admin-layout>
    <div class="row">
        <!-- Card đăng ký chờ duyệt -->
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-warning" style="font-weight: bold;">
                        <i class="fas fa-user-plus me-2"></i>
                        Đăng ký tuyển sinh
                    </h5>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <h3 class="mb-0">{{ $pendingRegistrations ?? 0 }}</h3>
                        <p class="fs-4">Chờ duyệt</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danh sách đăng ký mới nhất -->
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0 text-warning" style="font-weight: bold;">Đăng ký tuyển sinh mới nhất</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Phụ huynh</th>
                                    <th>Học sinh</th>
                                    <th>Lớp đăng ký</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đăng ký</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestRegistrations ?? [] as $registration)
                                    <tr>
                                        <td>{{ $registration->phuhuynh_name }}</td>
                                        <td>{{ $registration->child_name }}</td>
                                        <td>
                                            @switch($registration->class_registered)
                                                @case('nha_tre')
                                                    Nhà trẻ (18-36 tháng)
                                                    @break
                                                @case('mau_giao_nho')
                                                    Mẫu giáo nhỡ (3-4 tuổi)
                                                    @break
                                                @case('mau_giao_lon')
                                                    Mẫu giáo lớn (4-5 tuổi)
                                                    @break
                                                @case('mau_giao_choi')
                                                    Mẫu giáo chồi (5-6 tuổi)
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($registration->status)
                                                @case('pending')
                                                    <span class="badge badge-warning">Chờ duyệt</span>
                                                    @break
                                                @case('approved')
                                                    <span class="badge badge-success">Đã duyệt</span>
                                                    @break
                                                @case('rejected')
                                                    <span class="badge badge-danger">Từ chối</span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>{{ $registration->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.tuyensinh.show', $registration->id) }}" 
                                               class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Không có đăng ký nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>