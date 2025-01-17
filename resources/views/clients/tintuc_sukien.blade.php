@extends('layout.client')

@section('content')
{{-- Link to custom CSS --}}
<link href="{{ asset('css/tintuc_sukien.css') }}" rel="stylesheet">

<div class="news-events-page">
    <div class="container py-5">
        <!-- Tin tức section -->
        <div class="news-section mb-5">
            <h2 class="section-title text-center mb-4">Tin tức - Thông báo</h2>
            <div class="row">
                <div class="col-md-6">
                    <!-- Latest news - large card -->
                    @if($tintuc->count() > 0)
                        @php $latestNews = $tintuc->first() @endphp
                        <div class="news-card card featured-card">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('images/event.jpg') }}" class="card-img-top" alt="News Image">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $latestNews->tieu_de }}</h5>
                                <div class="meta-info">
                                    <div class="date">
                                        <i class='bx bx-calendar'></i>
                                        <span>{{ date('d/m/Y', strtotime($latestNews->ngay_dang)) }}</span>
                                    </div>
                                    <div class="time ms-3">
                                        <i class='bx bx-time'></i>
                                        <span>{{ date('H:i', strtotime($latestNews->ngay_dang)) }}</span>
                                    </div>
                                </div>
                                <p class="card-text">{{ Str::limit($latestNews->noi_dung, 300) }}</p>
                                <a href="{{ route('tintuc.detail', $latestNews->id) }}" class="btn btn-read-more">
                                    <span>Xem thêm</span>
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="col-md-6">
                    <!-- Other news - smaller cards -->
                    <div class="small-cards-container">
                        @forelse($tintuc->skip(1)->take(3) as $tin)
                            <div class="news-card card small-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $tin->tieu_de }}</h5>
                                    <div class="meta-info">
                                        <div class="date">
                                            <i class='bx bx-calendar'></i>
                                            <span>{{ date('d/m/Y', strtotime($tin->ngay_dang)) }}</span>
                                        </div>
                                        <div class="time ms-3">
                                            <i class='bx bx-time'></i>
                                            <span>{{ date('H:i', strtotime($tin->ngay_dang)) }}</span>
                                        </div>
                                    </div>
                                    <p class="card-text">{{ Str::limit($tin->noi_dung, 100) }}</p>
                                    <a href="{{ route('tintuc.detail', $tin->id) }}" class="btn btn-read-more btn-primary">
                                        <span>Xem thêm</span>
                                        <i class='bx bx-right-arrow-alt'></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="no-data-message">Không có tin tức nào.</p>
                        @endforelse

                        @if($tintuc->count() > 4)
                            <div class="text-center mt-3">
                                <a href="#" class="btn btn-view-all">
                                    <span>Xem tất cả tin tức</span>
                                    <i class='bx bx-chevrons-right'></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Sự kiện section -->
        <div class="events-section">
            <h2 class="section-title text-center mb-4">Sự kiện - Hoạt động</h2>
            <div class="row">
                <div class="col-md-6">
                    <!-- Latest event - large card -->
                    @if($sukien->count() > 0)
                        @php $latestEvent = $sukien->first() @endphp
                        <div class="event-card card featured-card">
                            <div class="card-img-wrapper">
                                <img src="{{ asset('images/event.jpg') }}" class="card-img-top" alt="Event Image">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $latestEvent->tieu_de }}</h5>
                                <div class="meta-info">
                                    <div class="date">
                                        <i class='bx bx-calendar'></i>
                                        <span>{{ date('d/m/Y', strtotime($latestEvent->ngay_dien_ra)) }}</span>
                                    </div>
                                    <div class="time ms-3">
                                        <i class='bx bx-time'></i>
                                        <span>{{ $latestEvent->thoi_gian_bat_dau }} - {{ $latestEvent->thoi_gian_ket_thuc }}</span>
                                    </div>
                                    <div class="status ms-3">
                                        <span class="badge {{ strtolower(str_replace(' ', '-', $latestEvent->trang_thai)) }}">
                                            {{ $latestEvent->trang_thai }}
                                        </span>
                                    </div>
                                </div>
                                <p class="card-text">{{ Str::limit($latestEvent->mo_ta, 300) }}</p>
                                <a href="{{ route('sukien.detail', $latestEvent->id) }}" class="btn btn-read-more">
                                    <span>Xem thêm</span>
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="col-md-6">
                    <!-- Other events - smaller cards -->
                    <div class="small-cards-container">
                        @forelse($sukien->skip(1)->take(3) as $event)
                            <div class="event-card card small-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->tieu_de }}</h5>
                                    <div class="meta-info">
                                        <div class="date">
                                            <i class='bx bx-calendar'></i>
                                            <span>{{ date('d/m/Y', strtotime($event->ngay_dien_ra)) }}</span>
                                        </div>
                                        <div class="time ms-3">
                                            <i class='bx bx-time'></i>
                                            <span>{{ $event->thoi_gian_bat_dau }} - {{ $event->thoi_gian_ket_thuc }}</span>
                                        </div>
                                        <div class="status ms-3">
                                            <span class="badge {{ strtolower(str_replace(' ', '-', $event->trang_thai)) }}">
                                                {{ $event->trang_thai }}
                                            </span>
                                        </div>
                                    </div>
                                    <p class="card-text">{{ Str::limit($event->mo_ta, 100) }}</p>
                                    <a href="{{ route('sukien.detail', $event->id) }}" class="btn btn-read-more">
                                        <span>Xem thêm</span>
                                        <i class='bx bx-right-arrow-alt'></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="no-data-message">Không có sự kiện nào.</p>
                        @endforelse

                        @if($sukien->count() > 4)
                            <div class="text-center mt-3">
                                <a href="#" class="btn btn-view-all">
                                    <span>Xem tất cả sự kiện</span>
                                    <i class='bx bx-chevrons-right'></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection