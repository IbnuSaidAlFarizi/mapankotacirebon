<!-- resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Pengaturan Umum')
@section('id_nav', 'settings_nav')

@section('content')

    <section class="bg-white dark:bg-gray-800 mt-10">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Disini kamu bisa mengatur beberapa ketentuan dasar, seperti  logo, nama sekolah, alamat kontak, info akun dan lainnya</p>

                <div class="  px-4 mx-auto max-w-screen-xl">
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="umum-styled-tab" data-tabs-target="#styled-umum" type="button" role="tab" aria-controls="umum" aria-selected="false">Umum</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="kontak-styled-tab" data-tabs-target="#styled-kontak" type="button" role="tab" aria-controls="kontak" aria-selected="false">Kontak</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="akun-styled-tab" data-tabs-target="#styled-akun" type="button" role="tab" aria-controls="akun" aria-selected="false">Akun
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div id="default-styled-tab-content">
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-umum" role="tabpanel" aria-labelledby="umum-tab">
                            <form action="{{ route('settings.umum') }}" class="disabled-btn" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="grid gap-4 mb-4 grid-cols-3">
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Nama Website'])
                                        @include('admin.elements.text-input', ['name' => 'app_name', 'value' => $setting->app_name])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Singkatan'])
                                        @include('admin.elements.text-input', ['name' => 'app_name2', 'value' => $setting->app_name2])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Uraian Singkatan'])
                                        @include('admin.elements.text-input', ['name' => 'app_name3', 'value' => $setting->app_name3])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Open Weekday'])
                                        @include('admin.elements.text-input', ['name' => 'open_weekday', 'value' => $setting->open_weekday])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Open Weekend'])
                                        @include('admin.elements.text-input', ['name' => 'open_weekend', 'value' => $setting->open_weekend])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Alamat'])
                                        @include('admin.elements.textarea', ['name' => 'address', 'value' => $setting->address])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Logo Berwarna'])
                                        @include('components.input-file', ['name' => 'logo', 'accept' => '.jpg,.jpeg,.png', 'type' => 'JPG or JPEG'])
                                    </div>
                                    <div class="col-span-1">
                                        <figure class="max-w-lg p-4">
                                            <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/template/assets/img/' . $setting->logo) }}" alt="image description">
                                            <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">Logo berwarna saat ini</figcaption>
                                        </figure>

                                    </div>
                                </div>
                                @include('components.button')
                            </form>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-kontak" role="tabpanel" aria-labelledby="kontak-tab">
                            <form action="{{ route('settings.contact') }}" class="disabled-btn" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="grid gap-4 mb-4 grid-cols-3">

                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Email'])
                                        @include('admin.elements.text-input', ['name' => 'email', 'value' => $setting->email])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Telepon'])

                                        @include('admin.elements.text-input', ['name' => 'phone', 'value' => $setting->phone])
                                     </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Youtube'])
                                        @include('admin.elements.text-input', ['name' => 'youtube', 'value' => $setting->youtube])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Facebook'])
                                        @include('admin.elements.text-input', ['name' => 'facebook', 'value' => $setting->facebook])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Instagram'])
                                        @include('admin.elements.text-input', ['name' => 'instagram', 'value' => $setting->instagram])
                                    </div>
                                </div>
                                @include('components.button')
                            </form>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-akun" role="tabpanel" aria-labelledby="akun-tab">

                            <form action="{{ route('settings.account') }}" class="disabled-btn" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="grid gap-4 mb-4 grid-cols-3">
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Nama Depan'])
                                        @include('admin.elements.text-input', ['name' => 'firstName', 'value' => Auth::user()->firstName])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Nama Tengah'])
                                        @include('admin.elements.text-input', ['name' => 'middleName', 'value' => Auth::user()->middleName])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Nama Belakang'])
                                        @include('admin.elements.text-input', ['name' => 'lastName', 'value' => Auth::user()->lastName])
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Email'])
                                        <input type="email" required name="email" value="{{ Auth::user()->email }}" class=" rounded bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"">
                                    </div>
                                    <div class="col-span-1">
                                        @include('admin.elements.label', ['text' => 'Foto Profil'])
                                        <x-input-file required :name="'photo'" :accept="'.jpg,.jpeg,.png'" :type="'JPG, JPEG or PNG.'" />
                                    </div>
                                    <div class="col-span-1">
                                        <figure class="max-w-lg p-4 text-center">
                                            <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/template/assets/img/' . Auth::user()->photo) }}" alt="image description">
                                            <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">Profil saat ini</figcaption>
                                        </figure>

                                    </div>
                                </div>
                                <div class="flex justify-between">

                                @include('components.button')
                                    <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-white bg-red-700 mt-3 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Ubah Kata Sandi</button>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Ubah kata sandi
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4 disabled-btn"  action="{{ route('settings.pass') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Lama</label>
                            <input type="password" name="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                            <input type="password" name="passwordnew" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password Baru</label>
                            <input type="password" name="passwordnew2" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                            <span id="confirm-password-message"></span>
                        </div>

                        @include('components.button')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordField = document.querySelector('input[name="passwordnew"]');
            const confirmPasswordField = document.querySelector('input[name="passwordnew2"]');
            const confirmPasswordMessage = document.querySelector('#confirm-password-message');
            const updateButton = document.querySelector('#btn-pass');

            // Event listener untuk setiap kali pengguna mengetik di field password baru kedua
            confirmPasswordField.addEventListener('input', function() {
                const password = passwordField.value;
                const confirmPassword = confirmPasswordField.value;

                // Membandingkan nilai kedua field
                if (password === confirmPassword && password.length >= 6) {
                    // Jika password cocok dan panjang minimal 6 karakter, aktifkan tombol
                    confirmPasswordMessage.textContent = 'Password cocok.';
                    confirmPasswordMessage.classList.remove('text-red-600');
                    confirmPasswordMessage.classList.add('text-green-600');
                    updateButton.removeAttribute('disabled');
                } else {
                    // Jika password tidak cocok atau panjang kurang dari 6 karakter, nonaktifkan tombol
                    confirmPasswordMessage.textContent = 'Password tidak cocok atau kurang dari 6 karakter.';
                    confirmPasswordMessage.classList.remove('text-green-600');
                    confirmPasswordMessage.classList.add('text-red-600');
                    updateButton.setAttribute('disabled', 'disabled');
                }
            });
        });
    </script>
@endsection
