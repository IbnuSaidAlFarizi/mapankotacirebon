<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Halaman Ekstrakurikuler')
@section('id_nav', 'ekskul_nav')

@section('content')
    <section class="bg-white dark:bg-gray-800 mt-10">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <x-jumbroton :page="'Ekstrakurikuler'" :url="'ekstrakurikuler'" class="mt-2" />
            <div class="grid md:grid-cols-1 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <x-tag-icon :page="'Halaman Ekstrakurikuler'" />
                    <form action="{{ route('ekskul.update_hero') }}" class="disabled-btn" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                @include('components.label', ['text' => 'Judul'])
                                @include('components.input-text', ['name' => 'title', 'value' => $ekskul->title, 'placeholder' => 'Judul'])
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                @include('components.label', ['text' => 'Deskripsi'])
                                @include('admin.elements.textarea-summernote', ['name' => 'description', 'value' => $ekskul->description])
                            </div>
                        </div>

                        @include('components.button')
                    </form>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <x-tag-icon :page="'Ekstrakurikuler'" />
                    <div class="flex justify-end mb-3">
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                            Tambah data
                        </button>
                    </div>

                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-4xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <form class="p-4 md:p-5 disabled-btn" action="{{ route('ekskul.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div>
                                            @include('admin.elements.label', ['text' => 'Foto'])
                                            @include('components.input-file', ['name' => 'image', 'accept' => '.jpg,.jpeg', 'type' => 'JPG or JPEG'])
                                        </div>
                                        <div>
                                            @include('admin.elements.label', ['text' => 'Judul'])
                                            @include('components.input-text', ['name' => 'name', 'value' => old('name', ''), 'placeholder' => 'name'])
                                        </div>
                                    </div>
                                    <div class="grid gap-4 mb-4 grid-cols-1">
                                        <div>
                                            @include('components.label', ['text' => 'Deskripsi'])
                                            @include('admin.elements.textarea', ['name' => 'description', 'value' => old('description', '')])
                                        </div>
                                    </div>
                                    @include('components.button')
                                </form>

                            </div>
                        </div>
                    </div>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">#</th>
                                <th scope="col" class="px-6 py-3">Photo</th>
                                <th scope="col" class="px-6 py-3">Judul</th>
                                <th scope="col" class="px-6 py-3">Deskripsi</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item => $value)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th class="px-6 py-4">{{ $item + 1 }}</th>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('assets/template/assets/img/' . $value->image) }}" class="w-10 h-10 rounded-full">
                                    </td>
                                    <td class="px-6 py-4">{{ $value->name }}</td>
                                    <td class="px-6 py-4">{!! $value->description !!}</td>
                                    <td class="px-6 py-4 flex">
                                        <button type="button" data-modal-target="m-del{{ $item }}" data-modal-toggle="m-del{{ $item }}" class="focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-center inline-flex items-center me-2 dark:focus:ring-red-800">
                                            <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </button>
                                        <button type="button" data-modal-target="m-upd{{ $item }}" data-modal-toggle="m-upd{{ $item }}" class="focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-center inline-flex items-center me-2 dark:focus:ring-blue-800">
                                            <svg class="w-6 h-6 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
    @foreach ($list as $item => $value)
        <div id="m-del{{ $item }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="m-del{{ $item }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah kamu yakin ingin menghapus data {{ $value->name }}?</h3>
                        <form action="{{ route('ekskul.destroy', ['id' => $value->id]) }}" method="POST" class="inline disabled-btn">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya, hapus
                            </button>
                        </form>
                        <button data-modal-hide="m-del{{ $item }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batalkan</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($list as $item => $value)
        <div id="m-upd{{ $item }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="m-upd{{ $item }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5">
                        <form class="p-4 md:p-5 disabled-btn" action="{{ route('ekskul.update', ['id' => $value->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    @include('admin.elements.label', ['text' => 'Foto'])
                                    @include('components.input-file', ['name' => 'image', 'accept' => '.jpg,.jpeg', 'type' => 'JPG or JPEG'])
                                </div>
                                <div>
                                    @include('components.label', ['text' => 'Judul'])
                                    @include('components.input-text', ['name' => 'name', 'value' => $value->name, 'placeholder' => 'Judul'])
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    @include('components.label', ['text' => 'Deskripsi'])
                                    @include('admin.elements.textarea', ['name' => 'description', 'value' => $value->description])
                                </div>
                            </div>

                            @include('components.button')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
