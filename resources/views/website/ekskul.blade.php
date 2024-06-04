@extends('layouts.web')
@section('home_nav', 'active')
@section('content')
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3>{{ $ekskulPage->title }}</h3>
                <p>{{ $ekskulPage->description }}</p>
            </div>
            <div class="row g-4">
                @foreach ($ekskul as $item)
                    <div class="col-md-6">
                        <div class="card text-center border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5><b>{{ $item->name }}</b></h5>
                                <img src="{{ asset('assets/template/assets/img/' . $item->image) }}" class="img-fluid rounded-4 mb-4" alt="">
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
