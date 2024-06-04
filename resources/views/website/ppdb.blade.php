@extends('layouts.web')
@section('home_nav', 'active')
@section('content')
    <section>
        <div class="container text-center ">
            <div class="row align-items-center">
                <div class= "mt-8">
                    @if ($program->link_pendaftaran)
                        <p>Siap-siap untuk bergabung dengan program menarik kami! Silakan ikuti petunjuk di bawah ini:</p>
                        <a href="{{ $program->link_pendaftaran }}" target="blank" class="btn btn-success">Daftar Sekarang</a>
                    @else
                        <h4> Form ditutup sementara </h4>
                        <p>Silahkan Hubungi Kontak dibawah ini!</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
