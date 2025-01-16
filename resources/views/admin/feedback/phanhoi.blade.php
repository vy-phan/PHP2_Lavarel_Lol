<x-admin-layout>
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Quản lý phản hồi</h4>
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
                                        <th>STT</th>
                                        <th>Phụ huynh</th>
                                        <th>Học sinh</th>
                                        <th>Lớp đăng ký</th>
                                        <th>Ý kiến</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($feedbacks as $index => $feedback)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $feedback->phuhuynh_name }}</td>
                                            <td>{{ $feedback->child_name }}</td>
                                            <td>
                                                @switch($feedback->class_registered)
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
                                                    @default
                                                        {{ $feedback->class_registered }}
                                                @endswitch
                                            </td>
                                            <td>{{ $feedback->notes }}</td>
                                            <td>{{ $feedback->updated_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Không có phản hồi nào</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>