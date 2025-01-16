<x-client-layout>
{{-- Link to custom CSS --}}
    <link href="{{ asset('css/lienhe.css') }}" rel="stylesheet">

    <div class="container my-5">
        <div class="row">
            <!-- Thông tin liên hệ bên trái -->
            <div class="col-md-6">
                <h4>TRƯỜNG MẦM NON LITTLE SUN</h4>
                <p>12 Trịnh Đình Thảo, Phường Hòa Thanh, Quận Tân Phú, TP Hồ Chí Minh</p>
                <p><strong>Hotline:</strong> 0123 456 789</p>
                <p><strong>Email:</strong> tuyensinh@littesun.com</p>
                <p><strong>Website:</strong> <a class="text-decoration-none text-black" href="http://littlesunschool.com"
                        target="_blank">Littlesunschool.com</a></p>
            </div>

            <!-- Form góp ý bên phải -->
            <div class="col-md-6">
                <h4>Góp ý với chúng tôi</h4>
                <form>
                    <!-- Tên -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Họ và tên">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>

                    <!-- Chủ đề góp ý -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="subject" placeholder="Chủ đề góp ý">
                    </div>

                    <!-- Nội dung góp ý -->
                    <div class="mb-3">
                        <textarea class="form-control" id="feedback" rows="4" placeholder="Nội dung góp ý"></textarea>
                    </div>

                    <!-- Nút gửi -->
                    <div class="text-start mt-3">
                        <button type="submit" class="btn"
                            style="background-color: rgb(20, 194, 171); color: black; border: none;">Gửi góp ý</button>
                    </div>

                </form>
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