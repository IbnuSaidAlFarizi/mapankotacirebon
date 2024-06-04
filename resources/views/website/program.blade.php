@extends('layouts.web')
@section('home_nav', 'active')
@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>{{ $program->title }}</h2>
                        <p>{{ $program->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="portfolio-details" class="portfolio-details">
        <div class="container" data-aos="fade-up">
            <div class="position-relative h-100">
                <div class="slides-1 portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($photo as $item)
                            <div class="swiper-slide"> <img src="{{ asset('assets/template/assets/img/portfolio/' . $item->photo) }}" alt=""> </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="row justify-content-between gy-4 mt-4">
                <div class="col-lg-8">
                    <div class="portfolio-description">
                        {!! $program->info_beasiswa !!}
                        @if ($program->link_pendaftaran)
                            <a href="/ppdb-online" class="btn btn-success mt-3">Daftar sekarang</a>
                        @endif
                        <div class="testimonial-item">
                            <p> <i class="bi bi-quote quote-icon-left"></i>{{ $program->quote }}<i class="bi bi-quote quote-icon-right"></i> </p>
                            <div> <img src="{{ asset('assets/template/assets/img/' . $program->admin_photo) }}" class="testimonial-img" alt="">
                                <h3>{{ $program->admin_name }}</h3>
                                <h4>{{ $program->admin_position }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
