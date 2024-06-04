@extends('layouts.web')
@section('facilities_nav', 'active')
@section('content')
    <section id="services" class="services sections-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>{{ $facilities->title }}</h2>
                <p>{{ $facilities->description }}</p>
            </div>
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                @foreach ($list as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item  position-relative">
                            <div class="icon">
                                <i class="bi {{ $item->icon }}"></i>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
