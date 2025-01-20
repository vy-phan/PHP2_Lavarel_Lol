<x-admin-layout>
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Chỉnh sửa tài khoản</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.taikhoan.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Vai trò</label>
                                <select name="role" class="form-control" required>
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Người dùng</option>
                                    <option value="giaovien" {{ $user->role === 'giaovien' ? 'selected' : '' }}>Giáo viên</option>
                                    @if(auth()->user()->role === 'admin')
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    @endif
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <a href="{{ route('admin.quanlytaikhoan') }}" class="btn btn-danger">Hủy</a>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
