<title>Laporan</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
            @include('alert.alert-info') <!-- Memasukkan alert jika ada -->

            <div class="p-4 sm:p-6 dark:bg-gray-900 border-b border-gray-200">
                <form action="{{ route('laporan.cetak') }}" method="get" class="mb-4">
                    <div class="flex items-center space-x-4">
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

            <div class="p-4 sm:p-6 dark:bg-gray-900">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Peminjaman Terakhir</h3>

                @if ($peminjaman->isEmpty())
                    <p class="text-gray-600 dark:text-gray-300">Tidak ada data untuk periode yang dipilih.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Nomor Peminjaman
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Nama Peminjam
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Judul Buku
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Tanggal Pinjam
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Tanggal Kembali
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($peminjaman as $p)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $p->no_peminjaman }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-900">
                                            {{ $p->user->nama }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-900">
                                            {{ $p->buku->nama_buku }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-900">
                                            {{ \Carbon\Carbon::parse($p->tgl_peminjaman)->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-900">
                                            {{ \Carbon\Carbon::parse($p->tgl_pengembalian)->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-900">
                                            {{ $p->status }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
