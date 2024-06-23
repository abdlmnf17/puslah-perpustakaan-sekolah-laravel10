<form action="{{ route('denda-buku.store') }}" method="POST">
    @csrf
    @method('POST')


    <div class="mb-4">
        <x-input-label for="borrowing_id">{{ __('Nama Siswa') }}</x-input-label>
        <select id="borrowing_id" name="borrowing_id"
                class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">------ Pilih Peminjam ------
                </option>
            @foreach($borrowings as $borrowing)
                <option value="{{ $borrowing->id }}">
                    {{ $borrowing->user->name }} - {{ $borrowing->book_title }}
                </option>
            @endforeach
        </select>

        @error('borrowing_id')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>



    <div class="mb-4">
        <x-input-label for="total">{{ __('Jumlah Denda') }}</x-input-label>
        <x-text-input id="total" class="mt-1 block w-full" type="number" name="total"
        value="{{ old('total') }}" required />

        @error('total')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>


    <div class="mb-4">
        <x-input-label for="description">{{ __('Keterangan') }}</x-input-label>
        <textarea id="description" name="description"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $borrowing->description }}</textarea>
        @error('description')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="flex items-center space-x-4">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800">
            {{ __('Simpan') }}
        </x-primary-button>

        <x-secondary-button href="{{ route('peminjaman-buku.index') }}">
            Kembali
        </x-secondary-button>
    </div>
</form>
