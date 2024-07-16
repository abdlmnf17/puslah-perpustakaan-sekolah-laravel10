@if(auth()->user()->role !== 'siswa')
<div class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm">


    Admin Tidak Bisa Menambah Pinjaman Buku, Tugas Admin Mengedit Status Pinjaman
</div>
@endif



@if (auth()->user()->role !== 'admin')
    <form action="{{ route('peminjaman-buku.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <x-input-label for="user_id">{{ __('Nama Siswa') }}</x-input-label>
            <x-text-input id="user_id" class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm"
                type="text" name="name" value="{{ Auth::user()->nama }}" readonly />

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            @error('user_id')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
        </div>


        <div class="mb-4">
            <x-input-label for="book_id">{{ __('Pilih Buku') }}</x-input-label>
            <select id="book_id" name="book_id" class="mt-1 block w-full" required>
                <option value="">Pilih Buku</option>
                @foreach ($buku as $book)
                    <option value="{{ $book->id }}">{{ $book->nama_buku }}</option>
                @endforeach
            </select>
            @error('book_id')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
        </div>



        {{--
    <div class="mb-4">
        <x-input-label for="author">{{ __('Nama Pengarang') }}</x-input-label>
        <x-text-input id="author" class="mt-1 block w-full" type="text" name="author" value="{{ old('author') }}"
            required />
        @error('author')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>


    <div class="mb-4">
        <x-input-label for="release_year">{{ __('Tahun Rilis') }}</x-input-label>
        <x-text-input id="release_year" class="mt-1 block w-full" type="number" name="release_year"
            value="{{ old('release_year') }}" required />
        @error('release_year')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div> --}}

        <div class="mb-4">
            <x-input-label for="borrow_date">{{ __('Tanggal Meminjam') }}</x-input-label>
            <x-text-input id="borrow_date" class="mt-1 block w-full" type="date" name="borrow_date"
                value="{{ old('borrow_date') }}" required />
            @error('borrow_date')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
        </div>

        <div class="mb-4">
            <x-input-label for="return_date">{{ __('Tanggal Mengembalikan') }}</x-input-label>
            <x-text-input id="return_date" class="mt-1 block w-full" type="date" name="return_date"
                value="{{ old('return_date') }}" required />
            @error('return_date')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
        </div>
        <br />

        <div class="flex items-center space-x-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800">
                {{ __('Simpan') }}
            </x-primary-button>

            <x-secondary-button href="{{ route('peminjaman-buku.index') }}">
                Kembali
            </x-secondary-button>

        </div>

    </form>
@endif
