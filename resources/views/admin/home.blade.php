<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Halaman Beranda')
@section('id_nav', 'home_nav')

@section('content')

    <section class="bg-white dark:bg-gray-800 mt-10">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <x-jumbroton :page="'Beranda'" :url="''" class="mt-2" />
            <div class="grid md:grid-cols-1 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <x-tag-icon :page="'Halaman Beranda'" />
                    <form action="{{ route('home.update') }}"  class="disabled-btn"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Section 1 -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                @include('components.label', ['text' => 'Judul'])
                                @include('components.input-text', ['name' => 'section1_title', 'value' => $home->section1_title, 'placeholder' => 'Judul'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'Subjudul'])
                                @include('components.input-text', ['name' => 'section1_subtitle', 'value' => $home->section1_subtitle, 'placeholder' => 'Subjudul'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'Ganti Foto'])
                                @include('components.input-file', ['name' => 'section1_photo', 'accept' => '.jpg,.jpeg,.png', 'type' => 'JPG, PNG or JPEG'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'URL Button'])
                                @include('components.input-text', ['name' => 'section1_url', 'value' => $home->section1_url, 'placeholder' => 'URL Button'])
                            </div>
                        </div>

                        <hr class="my-10">

                        <!-- Section 2 -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                @include('components.label', ['text' => 'List 1'])
                                @include('components.input-text', ['name' => 'section2_list1', 'value' => $home->section2_list1, 'placeholder' => 'List 1'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'Nilai List 1'])
                                @include('components.input-text', ['name' => 'section2_list1_val', 'value' => $home->section2_list1_val, 'placeholder' => 'Nilai List 1'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'List 2'])
                                @include('components.input-text', ['name' => 'section2_list2', 'value' => $home->section2_list2, 'placeholder' => 'List 2'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'Nilai List 2'])
                                @include('components.input-text', ['name' => 'section2_list2_val', 'value' => $home->section2_list2_val, 'placeholder' => 'Nilai List 2'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'List 3'])
                                @include('components.input-text', ['name' => 'section2_list3', 'value' => $home->section2_list3, 'placeholder' => 'List 3'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'Nilai List 3'])
                                @include('components.input-text', ['name' => 'section2_list3_val', 'value' => $home->section2_list3_val, 'placeholder' => 'Nilai List 3'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'Foto Section 2'])
                                @include('components.input-file', ['name' => 'section2_photo', 'accept' => '.jpg,.jpeg,.png', 'type' => 'JPG, PNG or JPEG'])
                            </div>
                        </div>

                        <hr class="my-10">

                        <!-- Section 3 -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                @include('components.label', ['text' => 'Judul'])
                                @include('components.input-text', ['name' => 'section3_title', 'value' => $home->section3_title, 'placeholder' => 'Judul'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'Subjudul'])
                                @include('components.input-text', ['name' => 'section3_subtitle', 'value' => $home->section3_subtitle, 'placeholder' => 'Subjudul'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'Video 1'])
                                @include('components.input-file', ['name' => 'section3_vid1', 'accept' => '.mp4', 'type' => 'MP4'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'Video 2'])
                                @include('components.input-file', ['name' => 'section3_vid2', 'accept' => '.mp4', 'type' => 'MP4'])
                            </div>
                            <div>
                                @include('components.label', ['text' => 'Foto'])
                                @include('components.input-file', ['name' => 'section3_photo', 'accept' => '.jpg,.jpeg,.png', 'type' => 'JPG, PNG or JPEG'])
                            </div>
                        </div>
                        @include('components.button')
                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection
