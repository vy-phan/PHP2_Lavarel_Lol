<x-client-layout>
{{-- Link to custom CSS --}}
    <link href="{{ asset('css/lienhe.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <div class="contact-container">
        <div class="row">
            <!-- Thông tin liên hệ bên trái -->
            <div class="col-md-6">
                <div class="contact-info">
                    <h4><i class='bx bxs-school me-2'></i>TRƯỜNG MẦM NON LITTLE SUN</h4>
                    <p><i class='bx bxs-map me-2'></i>12 Trịnh Đình Thảo, Phường Hòa Thanh, Quận Tân Phú, TP Hồ Chí Minh</p>
                    <p><i class='bx bxs-phone me-2'></i><strong>Hotline:</strong> 0123 456 789</p>
                    <p><i class='bx bxs-envelope me-2'></i><strong>Email:</strong> tuyensinh@littesun.com</p>
                    <p><i class='bx bx-globe me-2'></i><strong>Website:</strong> <a class="text-decoration-none" href="http://littlesunschool.com" target="_blank">Littlesunschool.com</a></p>
                </div>
            </div>

            <!-- Form góp ý bên phải -->
            <div class="col-md-6">
                <div class="feedback-form">
                    <h4><i class='bx bxs-message-dots me-2'></i>Gửi thông tin ý kiến</h4>
                    @auth
                        @if(session('success'))
                            <div class="alert alert-success">
                                <i class='bx bxs-check-circle me-2'></i>{{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                <i class='bx bxs-x-circle me-2'></i>{{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('lienhe.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="notes" class="form-label">Nội dung ý kiến</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" 
                                        id="notes" 
                                        name="notes" 
                                        rows="4" 
                                        placeholder="Nhập nội dung ý kiến của bạn" 
                                        required>{{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn-submit">
                                    <i class='bx bx-send'></i>Gửi ý kiến
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info">
                            <i class='bx bx-info-circle me-2'></i>Vui lòng <a href="{{ route('dangnhap') }}" class="alert-link">đăng nhập</a> để gửi ý kiến.
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Bản đồ -->
        <div class="row mt-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d346.4358238825809!2d106.63449050348855!3d10.77496776348373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ea168a65c0b%3A0x2a4a7dc43e177de1!2zMTIgVHLhu4tuaCDEkMOsbmggVGjhuqNvLCBIb8OgIFRoYW5oLCBUw6JuIFBow7osIEjhu5MgQ2jDrSBNaW5oIDcwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1736356992241!5m2!1svi!2s"
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

    </div>
</x-client-layout>