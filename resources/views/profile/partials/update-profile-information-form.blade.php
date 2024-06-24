<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update profile kamu.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <!-- Address -->
        <div>
            <x-input-label for="adress" :value="__('Alamat')" />
            <x-text-input id="adress" name="adress" type="text" class="mt-1 block w-full" :value="old('adress', $user->adress)"
                required autocomplete="adress" />
            <x-input-error class="mt-2" :messages="$errors->get('adress')" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="telepon" :value="__('No HP')" />
            <x-text-input id="telepon" name="telepon" type="number" class="mt-1 block w-full" :value="old('telepon', $user->telepon)"
                required autocomplete="telepon" />
            <x-input-error class="mt-2" :messages="$errors->get('telepon')" />
        </div>

        <!-- Identity (e.g., ID number, Passport number) -->
        <div>
            <x-input-label for="identity" :value="__('NIS / NIP')" />
            <x-text-input id="identity" name="identity" type="text" class="mt-1 block w-full" :value="old('identity', $user->identity)"
                required autocomplete="identity" />
            <x-input-error class="mt-2" :messages="$errors->get('identity')" />
        </div>

        <!-- Class -->
        <div>
            <x-input-label for="class" :value="__('Kelas')" />
            <x-text-input id="class" name="class" type="text" class="mt-1 block w-full" :value="old('class', $user->class)"
                required autocomplete="class" />
            <x-input-error class="mt-2" :messages="$errors->get('class')" />
        </div>


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
