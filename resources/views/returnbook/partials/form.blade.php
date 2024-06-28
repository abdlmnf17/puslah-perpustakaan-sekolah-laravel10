<form action="{{ route('pengembalian-buku.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <x-input-label for="borrowing_id">{{ __('Peminjaman Buku') }}</x-input-label>
        <select id="borrowing_id" name="borrowing_id" class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm" required>
            <option value="" selected disabled>Pilih Peminjaman</option>
            @foreach ($peminjaman as $p)
                <option value="{{ $p->id }}" {{ old('borrowing_id') == $p->id ? 'selected' : '' }}>
                    Peminjaman ID {{ $p->id }} - {{ $p->book_title }}
                </option>
            @endforeach
        </select>

        @error('borrowing_id')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>




    <div class="mb-4">
        <x-input-label for="photo">{{ __('Bukti Pengembalian') }}</x-input-label>
        <input id="photo" class="mt-1 block w-full" type="file" name="photo"
            accept="image/jpeg, image/png, image/gif">
        @error('photo')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>


    <br />

    <div class="flex items-center space-x-4">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800">
            {{ __('Simpan') }}
        </x-primary-button>

        <x-secondary-button href="{{ route('pengembalian-buku.index') }}">
            Kembali
        </x-secondary-button>
    </div>

</form>
