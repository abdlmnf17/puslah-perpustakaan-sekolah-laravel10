<form action="{{ route('pengembalian-buku.update', $pengembalian->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="mb-4">
        <x-input-label for="status">{{ __('Status') }}</x-input-label>
        <select id="status" name="status"
            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

            <option value="">Semua Status</option>
            <option value="ACC" {{ $pengembalian->status == 'ACC' ? 'selected' : '' }}>ACC</option>
            <option value="PENDING" {{ $pengembalian->status == 'PENDING' ? 'selected' : '' }}>
                PENDING</option>
        </select>
        @error('status')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>


    <div class="mb-4">
        <x-input-label for="description">{{ __('Keterangan') }}</x-input-label>
        <textarea id="description" name="description"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $pengembalian->description }}</textarea>
        @error('description')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="flex items-center space-x-4">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800">
            {{ __('Simpan') }}
        </x-primary-button>

        <x-secondary-button href="{{ route('pengembalian-buku.index') }}">
            Kembali
        </x-secondary-button>
    </div>
</form>
