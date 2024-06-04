@extends('layouts.web')
@section('contact_nav', 'active')
@section('content')
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Kontak</h2>
                <p>Kritik dan Saran Anda dapat membantu Kami</p>
            </div>
            <div class="row gx-lg-4 gy-8">
                <div class="col-lg-4">
                    <div class="info-container d-flex flex-column align-items-center justify-content-center">
                        <div class="info-item d-flex"> <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Location:</h4>
                                <p>{{ $setting->address }}</p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="info-item d-flex"> <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p>{{ $setting->email }}</p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="info-item d-flex"> <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Call:</h4>
                                <p>{{ $setting->phone }}</p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="info-item d-flex"> <i class="bi bi-clock flex-shrink-0"></i>
                            <div>
                                <h4>Open Hours:</h4>
                                <p>{{ $setting->open_weekday }}</p>
                                <p>{{ $setting->open_weekend }}</p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>
                </div>
                <div class="col-lg-8 .col-auto">
                    <form id="contactForm" action="{{ route('mail.send') }}" method="POST" class="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" id="message" name="message" rows="7" placeholder="Message" required></textarea>
                        </div>
                        <div class="mt-3">
                            <div class="loading"></div>
                            <div class="error-message text-danger"></div>
                            <div class="sent-message text-success"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="sendMessageBtn" class="btn btn-success">Send Message</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('sendMessageBtn').addEventListener('click', function() {
                this.disabled = true;
                this.innerText = 'Mengirim...';
                var form = this.closest('form');
                var formData = new FormData(form);
                var xhr = new XMLHttpRequest();
                xhr.open(form.method, form.action);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState !== XMLHttpRequest.DONE) return;
                    document.getElementById('sendMessageBtn').disabled = false;
                    if (xhr.status === 200) {
                        document.querySelector('.sent-message').innerHTML = 'Pesan Anda berhasil dikirim!';
                        document.querySelector('.sent-message').style.display = 'block';
                        document.getElementById('sendMessageBtn').remove();

                    } else {
                        document.querySelector('.error-message').innerHTML = 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.';
                        document.querySelector('.error-message').style.display = 'block';
                    }
                };
                xhr.send(formData);
            });
        });
    </script>

@endsection
