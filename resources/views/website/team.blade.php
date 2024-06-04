@extends('layouts.web')
@section('team_nav', 'active')
@section('content')
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>{{ $team->title }}</h2>
                <p>{{ $team->description }}</p>
            </div>
            <div class="row gy-4">
                @foreach ($list as $item)
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <img src="{{ asset('assets/template/assets/img/team/'.$item->image) }}" class="img-fluid" alt="{{ $item->name }}">
                            <h4>{{ $item->name }}</h4>
                            <span>{{ $item->position }}</span>
                            <div class="social">
                                <a href="{{ $item->twitter }}"><i class="bi bi-twitter"></i></a>
                                <a href="{{ $item->facebook }}"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $item->instagram }}"><i class="bi bi-instagram"></i></a>
                                <a href="{{ $item->linkedin }}"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
