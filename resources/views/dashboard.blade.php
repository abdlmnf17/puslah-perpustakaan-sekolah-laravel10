<title>{{ config('app.titleDashboard', 'Laravel') }} - {{ $settings->webname }}</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('alert.alert-info')
                    <br/>

                    <div class="max-w-sm mx-auto">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center">
                            <img src="https://www.svgrepo.com/show/513520/book-closed.svg"
                                class="mx-auto h-24 w-24" alt="Pinjam Buku">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">Perpustakaan Sekolah</div>
                                <p class="dark:text-gray-100 text-base">
                                    Pinjam Buku Favorit Kamu yang ada di Perpustakaan {{ $settings->webname }}.
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ route('peminjaman-buku.index') }}">Peminjaman Buku</a>
                                </span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ route('pengembalian-buku.index') }}">Pengembalian Buku</a>
                                </span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <a href="{{ route('profile.edit') }}">Ubah Profile</a>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
