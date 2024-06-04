@extends('layouts.web')
@section('home_nav', 'active')
@section('content')
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3>{{ $visi->title }}</h3>
                {{ $visi->description }}
            </div>
            <div class="row gy-4">
                <div class="col-lg-15">
                    <h2 style="text-align: center;"><b>{{ $visiMisi->title }}</h2>
                    <div class="row g-2">
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="p-3">
                                        <h5 class="text-center text-titile">VISI</h5>
                                    </div>
                                    {!! $visiMisi->vision !!}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="p-3">
                                        <h5 class="text-center text-titile">MISI</h5>
                                    </div>
                                    {!! $visiMisi->mission !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
@endsection
