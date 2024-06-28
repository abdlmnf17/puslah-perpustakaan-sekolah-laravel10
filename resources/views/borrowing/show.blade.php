<title>Detail Peminjaman</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pinjaman Buku') }} - {{ $borrowing->borrow_number }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-4 lg:px-10">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Nomor Peminjaman</td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->borrow_number }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Peminjam</td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Judul Buku</td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->book_title }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Pengarang</td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->author }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Tahun Terbit</td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->release_year }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Tanggal Pinjam</td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->borrow_date }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Tanggal Kembali</td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->return_date }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Status</td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->status }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Keterangan</td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->description }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Denda</td>
                            <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $borrowing->total_fine }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <br/>
            <x-secondary-button href="{{ route('peminjaman-buku.index') }}">
                Kembali
            </x-secondary-button>
        </div>
    </div>
</x-app-layout>
