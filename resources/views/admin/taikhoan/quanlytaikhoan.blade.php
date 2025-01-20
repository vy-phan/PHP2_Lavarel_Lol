<x-admin-layout>
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Quản lý tài khoản</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Vai trò</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @if($user->role === 'admin' or $user->role === 'giaovien')
                                                {{ $user->email }}
                                            @else
                                                @if($registrations->has($user->email) && $registrations[$user->email])
                                                    <span class="text-success">{{ $user->email }}</span>
                                                @else
                                                    <span class="text-danger">{{ $user->email }}</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @switch($user->role)
                                                @case('admin')
                                                    <span class="badge badge-warning">Admin</span>
                                                    @break
                                                @case('giaovien')
                                                    <span class="badge badge-info">Giáo viên</span>
                                                    @break
                                                @default
                                                    @if($registrations->has($user->email) && $registrations[$user->email])
                                                        <span class="badge badge-success">Người dùng</span>
                                                    @else
                                                        <span class="badge badge-danger">Người dùng</span>
                                                    @endif
                                            @endswitch
                                        </td>
                                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.taikhoan.chinhsua', $user->id) }}" 
                                                   class="btn btn-primary btn-sm mr-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @if($user->role !== 'admin')
                                                    <form action="{{ route('admin.taikhoan.delete', $user->id) }}" 
                                                          method="POST" 
                                                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
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
</x-admin-layout>