@extends('layouts.web')
@section('home_nav','active')
@section('content')
    <section class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>{{ $home->section1_title }}</h2>
                    <h1>
                        <p>{{ $home->section1_subtitle }}</p>
                    </h1>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="/tentang-kami" class="btn-get-started">Get Started</a>
                        <a href="{{ $home->section1_url }}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2"> <img src="{{ asset('assets/template/assets/img/'. $home->section1_photo) }}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100"> </div>
            </div>
        </div>
        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-backpack2"></i></div>
                            <h4 class="title"><a href="/ekstrakurikuler" class="stretched-link">Ekstrakurikuler</a></h4>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-crosshair2"></i></div>
                            <h4 class="title"><a href="/visi-misi" class="stretched-link">Visi & Misi</a></h4>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-stars"></i></div>
                            <h4 class="title"><a href="/program-unggulan" class="stretched-link">Program Unggulan</a></h4>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-globe2"></i></div>
                            <h4 class="title"><a href="/ppdb-online" class="stretched-link">PPDB Online</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section  class="stats-counter">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-6"> <img src="{{ asset('assets/template/assets/img/MA.jpg') }}" alt="" class="img-fluid"> </div>
                <div class="col-lg-6">
                    <div class="stats-item d-flex align-items-center"> <span data-purecounter-start="0" data-purecounter-end="{{ $home->section2_list1_val }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>{{ $home->section2_list1 }}</p>
                    </div>
                    <div class="stats-item d-flex align-items-center"> <span data-purecounter-start="0" data-purecounter-end="{{ $home->section2_list2_val }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>{{ $home->section2_list2 }}</p>
                    </div>
                    <div class="stats-item d-flex align-items-center"> <span data-purecounter-start="0" data-purecounter-end="{{ $home->section2_list3_val }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>{{ $home->section2_list3 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="call-to-action">
        <div class="container text-center" data-aos="zoom-out">
            <a href="{{ asset('assets/template/assets/img/'.$home->section3_vid1) }}" type="video/mp4" class="glightbox play-btn"></a>
            <h3>{{ $home->section3_title }}</h3>
            <p> {{ $home->section3_subtitle }} </p>
            <a class="cta-btn" href="{{ asset('assets/template/assets/img/'.$home->section3_vid2) }}">Live Action</a>
        </div>
    </section>
    <section   class="clients">
        <div class="container" data-aos="zoom-out">
            <div class="section-header">
                <h2>Sponsorhip</h2>
                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                         @foreach ($client as $item)
                        <div class="swiper-slide"><img src="{{ asset('assets/template/assets/img/clients/'.$item->logo) }}" class="img-fluid" alt=""></div>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
