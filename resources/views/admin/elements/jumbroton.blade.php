
@php
    $urlbase = 'http://127.0.0.1:8000/'.$url;
@endphp
<div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
    <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Halaman {{ $page }}</h1>
    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Disini kamu bisa mengatur beberapa elemen yang ada pada halaman {{ $page }}</p>
    <a href="{{ $urlbase }}" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Kunjungi halaman
        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div>
