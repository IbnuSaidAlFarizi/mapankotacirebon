<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Halaman Hubungi Kami')
@section('id_nav', 'contact_nav')

@section('content')
    <section class="bg-white dark:bg-gray-800 mt-10">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <x-jumbroton :page="'Hubungi Kami'" :url="'contact-us'" class="mt-2" />
            <div class="grid md:grid-cols-1 gap-8">
                <x-form-meta :url="'meta-contact.update'" :meta="$meta" />
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <x-tag-icon :page="'Halaman Hubungi Kami'" />
                    <form action="{{ route('contact.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <x-label :text="'Judul Utama'" />
                                <x-input-text :name="'h1'" :value="$contact->h1" :placeholder="'Kami Ingin Membantu Anda'" />
                            </div>
                            <div class="col-span-2">
                                <x-label :text="'Deskripsi Halaman'" />
                                <x-textarea :name="'p'" :value="$contact->p" :placeholder="'Apakah Anda memiliki pertanyaan atau ingin berbagi umpan balik? Jangan ragu untuk menghubungi kami. Kami akan dengan senang hati membantu Anda'" />
                            </div>
                            <div class="col-span-1">
                                <x-label :text="'Teks 1'" />
                                <x-input-text :name="'c_h1_1'" :value="$data->h1_1" :placeholder="'Kasus baru?'" />
                            </div>
                            <div class="col-span-1">
                                <x-label :text="'Teks 2'" />
                                <x-input-text :name="'c_h1_2'" :value="$data->h1_2" :placeholder="'Kirim Kami Pesan'" />
                            </div>
                            <div class="col-span-1">
                                <x-label :text="'Penawaran'" />
                                <x-input-text :name="'c_p'" :value="$data->p" :placeholder="'Kirimkan saja pertanyaan atau kekhawatiran Anda kepada kami untuk memulai proyek baru.'" />

                            </div>
                            <div class="col-span-1">
                                <x-label :text="'Teks Pertanyaan'" />
                                <x-input-text :name="'c_text_photo'" :value="$data->text_photo" :placeholder="'ADA PERTANYAAN?'" />
                            </div>
                            <div class="col-span-1">
                                <x-label :text="'Hari Kerja'" />
                                <x-input-text :name="'c_day_work'" :value="$data->day_work" :placeholder="'Senin - Jumat'" />
                            </div>
                            <div class="col-span-1">
                                <x-label :text="'Waktu Kerja'" />
                                <x-input-text :name="'c_time_work'" :value="$data->time_work" :placeholder="'08.00 - 17.00'" />
                            </div>
                            <div class="col-span-1">
                                <x-label :text="'Waktu Libur'" />
                                <x-input-text :name="'c_leave_work'" :value="$data->leave_work" :placeholder="'Sabtu, Minggu, dan Hari Libur Nasional'" />
                            </div>
                            <div class="col-span-1">
                                <x-label :text="'Maps'" />
                                <x-input-text :name="'c_maps'" :value="$data->maps" :placeholder="'https://maps.app.goo.gl/uT6MmbezPKeW85Za6'" />
                            </div>
                        </div>
                        <x-button />
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
