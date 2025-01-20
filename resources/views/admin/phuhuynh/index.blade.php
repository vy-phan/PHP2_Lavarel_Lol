@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản Lý Phụ Huynh</h1>
    </div>

    {{-- Kiểm tra thông báo --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Phụ Huynh</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ Tên</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Số Con</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($phuHuynh as $ph)
                            <tr>
                                <td>{{ $ph->id }}</td>
                                <td>{{ optional($ph->user)->name ?? 'Chưa có' }}</td>
                                <td>{{ optional($ph->user)->email ?? 'Chưa có' }}</td>
                                <td>{{ optional($ph->user)->phone ?? 'Chưa có' }}</td>
                                <td>{{ $ph->treEm->count() }}</td>
                                <td>
                                    <a href="{{ route('admin.phuhuynh.show', $ph) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.phuhuynh.edit', $ph) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.phuhuynh.destroy', $ph) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa phụ huynh này?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Bảng dữ liệu nâng cấp với tính năng tìm kiếm, sắp xếp và hỗ trợ ngôn ngữ Việt --}}
@push('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Vietnamese.json'
            }
        });
    });
</script>
@endpush
