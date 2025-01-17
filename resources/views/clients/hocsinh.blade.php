@extends('layout.client')

@section('content')

@auth

<h1 class="text-center p-5" class="text-center p-5">Đây là trang thông tin học sinh</h1>

@endauth

@guest
<h1 class="text-center p-5">Vui lòng đăng nhập</h1>
@endguest

@endsection