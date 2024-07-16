<form action="{{ route('buku.store') }}" method="POST">
    @csrf



    <div class="mb-4">
        <x-input-label for="book_title">{{ __('Judul Buku') }}</x-input-label>
        <x-text-input id="book_title" class="mt-1 block w-full" type="text" name="book_title"
            value="{{ old('book_title') }}" required />
        @error('book_title')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

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
    </div>

    </div>

    <br/>

    <div class="flex items-center space-x-4">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800">
            {{ __('Simpan') }}
        </x-primary-button>

        <x-secondary-button href="{{ route('buku.index') }}">
            Kembali
        </x-secondary-button>

    </div>

</form>
