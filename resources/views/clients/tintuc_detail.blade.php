@extends('layout.client')

@section('content')
<link href="{{ asset('css/tintuc_detail.css') }}" rel="stylesheet">

<div class="news-detail-page">
    <div class="container py-5">
        <div class="news-detail-content">
            <h1 class="title mb-3">{{ $tintuc->tieu_de }}</h1>
            
            <div class="meta-info mb-4">
                <div class="date">
                    <i class='bx bx-calendar'></i>
                    <span>{{ date('d/m/Y', strtotime($tintuc->ngay_dang)) }}</span>
                </div>
                <div class="time ms-3">
                    <i class='bx bx-time'></i>
                    <span>{{ date('H:i', strtotime($tintuc->ngay_dang)) }}</span>
                </div>
            </div>

            <div class="content">
                {!! nl2br(e($tintuc->noi_dung)) !!}
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
