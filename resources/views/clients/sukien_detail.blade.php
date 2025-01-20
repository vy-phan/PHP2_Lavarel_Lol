@extends('layout.client')

@section('content')
<link href="{{ asset('css/sukien_detail.css') }}" rel="stylesheet">

<div class="event-detail-page">
    <div class="container py-5">
        <div class="event-detail-content">
            <h1 class="title mb-3">{{ $sukien->tieu_de }}</h1>
            
            <div class="meta-info mb-4">
                <div class="date">
                    <i class='bx bx-calendar'></i>
                    <span>{{ date('d/m/Y', strtotime($sukien->ngay_dien_ra)) }}</span>
                </div>
                <div class="time ms-3">
                    <i class='bx bx-time'></i>
                    <span>{{ $sukien->thoi_gian_bat_dau }} - {{ $sukien->thoi_gian_ket_thuc }}</span>
                </div>
                <div class="status ms-3">
                    <i class='bx bx-badge'></i>
                    <span class="badge {{ strtolower(str_replace(' ', '-', $sukien->trang_thai)) }}">
                        {{ $sukien->trang_thai }}
                    </span>
                </div>
            </div>

            <div class="content">
                {!! nl2br(e($sukien->mo_ta)) !!}
            </div>

            <div class="navigation mt-5">
                <a href="{{ route('tintuc_sukien') }}" class="btn btn-back">
                    <i class='bx bx-arrow-back'></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
