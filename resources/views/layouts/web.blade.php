<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Madrasah Aliyah Putri An-Nur Kota Cirebon')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{ asset('assets/template/assets/img/' . $setting->logo) }}" rel="icon">
    <link href="assets/template/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> <!-- Vendor CSS Files -->
    <link href="assets/template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/template/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/template/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/template/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/template/assets/css/main.css" rel="stylesheet">
    <style>
        .call-to-action .container {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ asset('assets/template/assets/img/maprofil.png') }}") center center;
        }
    </style>
</head>

<body>
    <section id="topbar" class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center"> <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">{{ $setting->email }}</a></i> <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $setting->phone }}</span></i> </div>
            <div class="social-links d-none d-md-flex align-items-center"> <a href="{{ $setting->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a> <a href="https://www.instagram.com/mapanofficialcrb?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="instagram"><i class="bi bi-instagram"></i></a> <a href="http://www.youtube.com/@maannurcirebon511" class="youtube"><i class="bi bi-youtube"></i></i></a> </div>
        </div>
    </section>
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between"> <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/template/assets/img/' . $setting->logo) }}" alt="">
                <h1>{{ $setting->app_name }}<span></span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/" class="@yield('home_nav')">Home</a></li>
                    <li><a href="/tentang-kami" class="@yield('about_nav')">Tentang</a></li>
                    <li><a href="/fasilitas" class="@yield('facilities_nav')">Fasilitas</a></li>
                    <li><a href="/tim-kami" class="@yield('team_nav')">Tim</a></li>
                    <li><a href="/hubungi-kami" class="@yield('contact_nav')">Kontak</a></li>
                </ul>
            </nav>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i> <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    <main> @yield('content') </main>
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info"> <a href="index.html" class="logo d-flex align-items-center"> <span>{{ $setting->app_name2 }}</span> </a>
                    <p>{{ $setting->app_name3 }} berlokasi di {{ $setting->address }} </p>
                    <div class="social-links d-flex mt-4"> <a href="{{ $setting->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $setting->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="{{ $setting->youtube }}" class="youtube"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Alternative Link</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/tentang-kami">Tentang</a></li>
                        <li><a href="/fasilitas">Fasilitas</a></li>
                        <li><a href="/tim-kami">Tim</a></li>
                        <li><a href="/hubungi-kami">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Menu Utama</h4>
                    <ul>
                        <li><a href="/visi-misi">Visi & Misi</a></li>
                        <li><a href="/program-unggulan">Program Unggulan</a></li>
                        <li><a href="/ekstrakurikuler">Ekstrakurikuler</a></li>
                        <li><a href="/ppdb-online">PPDB Online</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Kontak kami</h4>
                    <p>{{ $setting->address }}<br><br> <strong>Phone:</strong> {{ $setting->phone }}<br> <strong>Email:</strong> {{ $setting->email }}<br> </p>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="copyright"> &copy; Copyright <strong><span>{{ $setting->copyright }}</span></strong>. All Rights Reserved </div>
            <div class="credits"> Designed by <a href="https://www.instagram.com/saied_alfar/">DiasAlFar</a> </div>
        </div>
    </footer> <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <!-- Vendor JS Files -->
    <script src="assets/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/template/assets/vendor/aos/aos.js"></script>
    <script src="assets/template/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/template/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/template/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/template/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/template/assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/template/assets/js/main.js"></script>
    @yield('script','')
</body>

</html>
