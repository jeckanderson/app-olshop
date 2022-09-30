<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<section class="footer bg-dark">
    <div class="container footer-top py-4">
        <div class="row">
            <div class="col-md-3 mb-3">
                <h5 class="footer-title">Panduan</h5>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia perspiciatis magnam quis natus laudantium distinctio veniam, eaque deserunt tempore cupiditate atque aliquam esse vero odio laborum. Mollitia alias tempora eaque.</p>
            </div>
            <div class="col-md-3 mb-3">
                <h5 class="footer-title">Pelanggan</h5>
                <u class="ul-footer">
                    @if(Auth::check())
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth
                    <li><a href="{{ route('register') }}">Daftar</a></li>
                    <li><a href="/home/riwayat">Riwayat Belanja</a></li>
                    <li><a href="/user/profile">Akun saya</a></li>
                </u>
            </div>
            <div class="col-md-3 mb-3">
                <h5 class="footer-title mb-3">Kontak Kami</h5>
                <i class="fas fa-map-marker-alt mb-4 fs-6"></i> &nbsp&nbsp Jln. Gejayan, Yogyakarta<br>
                <i class="fas fa-phone-alt mb-4 fs-6"></i> &nbsp +62085200738097<br>
                <i class="fas fa-envelope fs-6"></i> &nbsp&nbsp jeckanderson.id@gmail.com
            </div>
            <div class="col-md-3">
                <h5 class="footer-title mb-3">Sosial Media</h5>
                {{-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas quas odio, rem unde quasi tempora reprehenderit culpa rerum dolorum corporis nulla optio praesentium repellat possimus, impedit dolor magni</p> --}}
                <input type="text" class="form-control rounded-pill mb-4" placeholder="Email..">
                <div class="social content-center">
                    <a href="https://wa.me/08520078097" target="_BLANK" class="btn btn-outline-primary rounded-circle">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://id-id.facebook.com" target="_BLANK" class="btn btn-outline-primary rounded-circle">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://instagram.com" target="_BLANK" class="btn btn-outline-primary rounded-circle">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://twiteer.com" target="_BLANK" class="btn btn-outline-primary rounded-circle">
                        <i class="fab fa-twitter-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3">
        <div class="text-center">Copyright &copy; <strong>Olshope Voices</strong>. {{ date("Y") }} All Right Reseved</div>
    </div>
    
</section>


{{-- <script src="{{ asset('templates/vendor/bootstrap/js/bootstrap.min.js') }}"></script> --}}
{{-- <script src="{{ asset('templates/vendor/jquery/jquery.min.js') }}"></script> --}}
<script src="{{ asset('templates/vendor/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('templates/vendor/js/style.js') }}"></script>
{{-- <script src="{{ asset('templates/vendor/jquery/jquery-3.6.0.min.js') }}"></script> --}}
{{-- <script src="{{ asset('templates/vendor/fontawesome-free/js/fontawesome.min.js') }}"></script> --}}
{{-- @yield('js') --}}

</body>
</html>