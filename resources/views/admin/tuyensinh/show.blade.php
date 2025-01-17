<x-admin-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Chi tiết đăng ký tuyển sinh</h4>
                    <a href="{{ route('admin.quanlytaikhoan') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left me-2"></i> Quay lại
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Thông tin phụ huynh</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Họ tên</th>
                                    <td>{{ $registration->phuhuynh_name ?? 'Chưa cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Điện thoại</th>
                                    <td>{{ $registration->phone ?? 'Chưa cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $registration->email ?? 'Chưa cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ</th>
                                    <td>{{ $registration->address ?? 'Chưa cập nhật' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Thông tin học sinh</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Họ tên</th>
                                    <td>{{ $registration->child_name ?? 'Chưa cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Ngày sinh</th>
                                    <td>{{ $registration->child_birth_date ? \Carbon\Carbon::parse($registration->child_birthday)->format('d/m/Y') : 'Chưa cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Giới tính</th>
                                    <td>{{ $registration->child_gender ? ($registration->child_gender == 'male' ? 'Nam' : 'Nữ') : 'Chưa cập nhật' }}</td>
                                </tr>
                                <tr>
                                    <th>Lớp đăng ký</th>
                                    <td>
                                        @if($registration->class_registered)
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
                                        @else
                                            Chưa cập nhật
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Thông tin bổ sung</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Trạng thái</th>
                                    <td>
                                        @switch($registration->status ?? 'pending')
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
                                </tr>
                                <tr>
                                    <th>Ngày đăng ký</th>
                                    <td>{{ $registration->created_at ? $registration->created_at->format('d/m/Y H:i') : 'Chưa cập nhật' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    @if(($registration->status ?? 'pending') == 'pending')
                    <div class="row mt-4">
                        <div class="col-12">
                            <form action="{{ route('admin.tuyensinh.update', $registration->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check me-2"></i> Duyệt đăng ký
                                </button>
                            </form>
                            <form action="{{ route('admin.tuyensinh.update', $registration->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-times me-2"></i> Từ chối
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
