<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Halaman Berita')
@section('id_nav', 'news_nav')
@section('id_nav2', 'news_nav1')
@section('aria-expanded-news', 'true')

@section('content')

    <section class="bg-white dark:bg-gray-800 mt-10">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="grid md:grid-cols-1 gap-8">
                @include('admin.elements.h1', ['page' => 'Edit Berita'])
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <form class="p-4 md:p-5" action="{{ route('news.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                @include('admin.elements.label', ['text' => 'Meta Keyword'])
                                <input type="hidden" name="id" value="{{ $news->id }}">
                                @include('admin.elements.text-input', ['name' => 'keyword', 'placeholder' => '...', 'value' => $news->keyword])
                                <p id="filled_success_help" class=" text-xs text-blue-600 dark:text-blue-400">Pisahkan dengan koma</p>
                            </div>
                            <div class="col-span-2">
                                @include('admin.elements.label', ['text' => 'Meta Description'])
                                @include('admin.elements.textarea', ['name' => 'description', 'value' => $news->description])
                            </div>
                            <div class="col-span-2">
                                <hr class="m-0 p-0">
                            </div>
                            <div class="col-span-1">
                                @include('admin.elements.label', ['text' => 'Judul'])
                                @include('admin.elements.text-input', ['name' => 'title', 'placeholder' => '...', 'value' => $news->title])
                            </div>
                            <div class="col-span-1">
                                @include('admin.elements.label', ['text' => 'Foto'])
                                <x-input-file :name="'photo'" :accept="'.jpg,.jpeg'" :type="'JPG or JPEG.'" />
                            </div>
                            <div class="col-span-1">
                                @include('admin.elements.label', ['text' => 'Kata-kata'])
                                @include('admin.elements.text-input', ['name' => 'quote', 'placeholder' => '...', 'value' => $news->quote])
                            </div>
                            <div class="col-span-1">
                                @include('admin.elements.label', ['text' => 'Penulis'])
                                @include('admin.elements.text-input', ['name' => 'quoter', 'placeholder' => '...', 'value' => $news->quoter])
                            </div>
                            <div class="col-span-2">
                                @include('admin.elements.label', ['text' => 'Kategori'])
                                <select id="countries" name="categories_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($category as $item)
                                        <option {{ $item->id == $news->categories_id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                @include('admin.elements.label', ['text' => 'Isi Berita'])
                                @include('admin.elements.textarea-summernote', ['name' => 'content', 'value' => $news->content])
                            </div>
                        </div>
                        @include('admin.elements.button-back', ['url' => 'news'])
                        @include('admin.elements.button-update')
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
