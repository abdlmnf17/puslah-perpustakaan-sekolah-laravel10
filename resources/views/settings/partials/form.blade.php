<form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Nama Web -->
    <div class="mb-4">
        <x-input-label for="nama_web">{{ __('Nama Sekolah') }}</x-input-label>
        <x-text-input id="nama_web" class="mt-1 block w-full" type="text" name="nama_web" :value="old('nama_web', $settings['nama_web'] ?? '')" required />
        @error('nama_web')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <!-- Deskripsi -->
    <div class="mb-4">
        <x-input-label for="deskripsi">{{ __('Deskripsi') }}</x-input-label>
        <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white sm:text-sm rounded-md">{{ old('deskripsi', $settings['deskripsi'] ?? '') }}</textarea>
        @error('deskripsi')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <!-- Upload Logo -->
    <div class="mb-4">
        <x-input-label for="logo">{{ __('Logo') }}</x-input-label>
        <input id="logo" type="file" name="logo" class="mt-1 block w-full" accept="image/jpeg, image/png, image/gif">
        <small class="text-gray-500">File yang diizinkan: JPEG, PNG, GIF</small>
        @if ($settings->logo)
            <div class="mt-2">
                <p class="text-sm text-gray-500">Logo saat ini:</p>
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="Current Logo" class="mt-1 h-20">
            </div>
        @endif
        @error('logo')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <!-- Upload Favicon -->
    <div class="mb-4">
        <x-input-label for="favicon">{{ __('Favicon') }}</x-input-label>
        <input id="favicon" type="file" name="favicon" class="mt-1 block w-full" accept="image/x-icon">
        <small class="text-gray-500">File yang diizinkan: ICO</small>
        @if ($settings->favicon)
            <div class="mt-2">
                <p class="text-sm text-gray-500">Favicon saat ini:</p>
                <img src="{{ asset('storage/' . $settings->favicon) }}" alt="Current Favicon" class="mt-1 h-12">
            </div>
        @endif
        @error('favicon')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <!-- Tombol Simpan -->
    <div class="flex justify-end">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800">
            {{ __('Simpan') }}
        </x-primary-button>
    </div>
</form>
