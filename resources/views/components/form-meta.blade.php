@props(['url', 'meta'])
<div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
    <a href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
            <path d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
        </svg>
        Meta Website
    </a>
    <form action="{{ route($url) }}" method="POST">
        @csrf
        @method('PUT')
        <x-label :text="'Keyword'" />
        <x-input-text :name="'keyword'" :value="$meta->keyword" :placeholder="'cth: Website KJA, KJA ABC...'" />
        <p id="filled_success_help" class=" text-xs text-blue-600 dark:text-blue-400">Pisahkan dengan koma</p>
        <x-label :text="'Description'" />
        <x-textarea :name="'description'" :value="$meta->description" :placeholder="'Ringkasan mengenai kja Anda'" />
        <x-button />
    </form>

</div>
