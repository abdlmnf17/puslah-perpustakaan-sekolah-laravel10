<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan Peminjaman') }}
        </h2>
    </x-slot>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
            @include('alert.alert-info')
            <div class="p-4 sm:p-6 dark:bg-gray-900 border-b border-gray-200">
                <form action="{{ route('laporan.cetak') }}" method="get" class="mb-4">
                    <div class="flex items-center space-x-2">
                        <label for="start_date" class="font-medium text-gray-700 dark:text-gray-300">Mulai Tanggal:</label>
                        <input type="date" id="start_date" name="start_date" required
                            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block rounded-md p-2">
                        <label for="end_date" class="font-medium text-gray-700 dark:text-gray-300">Sampai Tanggal:</label>
                        <input type="date" id="end_date" name="end_date" required
                            class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block rounded-md p-2">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Cetak
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
