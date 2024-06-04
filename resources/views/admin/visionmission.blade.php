<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Halaman Visi Misi')
@section('id_nav', 'visionmission_nav')

@section('content')

    <section class="bg-white dark:bg-gray-800 mt-10">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <x-jumbroton :page="'Visi Misi?'" :url="'vision-and-mission'" class="mt-2" />
            <div class="grid md:grid-cols-1 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <x-tag-icon :page="'Halaman Visi Misi'" />
                    <form action="{{ route('vision-mission.update-hero') }}" class="disabled-btn" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                @include('components.label', ['text' => 'Judul'])
                                @include('components.input-text', ['name' => 'title', 'value' => $page->title, 'placeholder' => 'Judul'])
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                @include('components.label', ['text' => 'Deskripsi'])
                                @include('admin.elements.textarea-summernote', ['name' => 'description', 'value' => $page->description])
                            </div>
                        </div>
                        @include('components.button')
                    </form>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <x-tag-icon :page="'Visi Misi'" />
                    <form action="{{ route('vision-mission.update') }}" class="disabled-btn" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                @include('components.label', ['text' => 'Judul'])
                                @include('components.input-text', ['name' => 'title', 'value' => $data->title, 'placeholder' => 'Judul'])
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                @include('components.label', ['text' => 'Visi'])
                                @include('admin.elements.textarea-summernote', ['name' => 'vision', 'value' => $data->vision])
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                @include('components.label', ['text' => 'Misi'])
                                @include('admin.elements.textarea-summernote', ['name' => 'mission', 'value' => $data->mission])
                            </div>
                        </div>
                        @include('components.button')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
