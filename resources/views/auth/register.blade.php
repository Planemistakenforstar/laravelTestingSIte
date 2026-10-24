<x-guest-layout>
    <div class="mb-6 text-center">
        <a href="/" class="inline-flex items-center gap-2 font-semibold text-lg text-gray-900">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-md bg-red-600 text-white">♪</span>
            <span>Bandcamp Streamer</span>
        </a>
        <h1 class="mt-4 text-xl font-bold text-gray-900">Create your account</h1>
        <p class="mt-1 text-sm text-gray-600">Start streaming Bandcamp artists in seconds.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div class="my-6">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="my-6">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="my-6">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="my-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit -->
        <div class="my-6">
            <x-primary-button class="w-full justify-center bg-red-600 hover:bg-red-700 focus:ring-red-500">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <!-- Login link -->
        <p class="text-center text-sm text-gray-600">
            Already registered?
            <a href="{{ route('login') }}" class="font-semibold text-red-600 hover:text-red-700">
                Log in
            </a>
        </p>
    </form>
</x-guest-layout>
