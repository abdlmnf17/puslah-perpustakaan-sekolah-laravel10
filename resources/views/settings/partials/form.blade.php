<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')

    <!-- Nama Web -->
    <div class="mb-4">
        <x-input-label for="nama_web">{{ __('Nama Website') }}</x-input-label>
        <x-text-input id="nama_web" class="mt-1 block w-full" type="text" name="nama_web" :value="old('nama_web', $settings['nama_web'] ?? '')" required />
        @error('nama_web')
            <x-input-error :message="$message" class="mt-2" />
        @enderror
    </div>

    <!-- Deskripsi -->
    <div class="mb-4">
        <x-input-label for="deskripsi">{{ __('Deskripsi') }}</x-input-label>
        <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white sm:text-sm rounded-md">{{ old('deskripsi', $settings['deskripsi'] ?? '') }}</textarea>
        @error('deskripsi')
            <x-input-error :message="$message" class="mt-2" />
        @enderror
    </div>

    <!-- Tombol Simpan -->
    <div class="flex justify-end">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800">
            {{ __('Simpan') }}
        </x-primary-button>
    </div>
</form>
