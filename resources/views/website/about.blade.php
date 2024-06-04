@extends('layouts.web')
@section('about_nav', 'active')
@section('content')
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>{{ $about->title }}</h2>
                <p>{{ $about->description }}</p>
            </div>
            <div class="row gy-4">
                <div class="col-lg-6">
                    <h3>Mengapa harus memilih kami?</h3>
                    <img src="{{ asset('assets/template/assets/img/' . $about->section1_image) }}" class="img-fluid rounded-4 mb-4" alt="">
                    <p>{{ $about->section2_description }}</p>
                </div>
                <div class="col-lg-6">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            Adapun kelebihan kami yaitu:
                        </p>
                        <ul>
                            @foreach ($why as $item)
                                <li><i class="bi bi-check-circle-fill"></i> <b>{{ $item->title }}:</b> {{ $item->description }}</li>
                            @endforeach
                        </ul>
                        <p>
                            {{ $about->section1_description }}
                        </p>
                        <div class="position-relative mt-4">
                            <img src="{{ asset('assets/template/assets/img/' . $about->section2_image) }}" class="img-fluid rounded-4" alt="">
                            <a href="{{ asset('assets/template/assets/img/' . $about->section2_video) }}" class="glightbox play-btn"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
