<x-guest-layout>
    <div class="mb-6 text-center">
        <a href="/" class="inline-flex items-center gap-2 font-semibold text-lg text-gray-900">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-md bg-red-600 text-white">♪</span>
            <span>Bandcamp Streamer</span>
        </a>
        <h1 class="mt-4 text-xl font-bold text-gray-900">Welcome back</h1>
        <p class="mt-1 text-sm text-gray-600">Log in to keep listening.</p>
    </div>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        <div class="my-6">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                          :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="my-6">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password"
                          name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between my-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500"
                       name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline hover:text-gray-900"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <x-primary-button class="w-full justify-center bg-red-600 hover:bg-red-700 focus:ring-red-500">
            {{ __('Log in') }}
        </x-primary-button>

        @if (Route::has('register'))
            <p class="text-center text-sm text-gray-600 mt-3">
                No account?
                <a href="{{ route('register') }}" class="font-semibold text-red-600 hover:text-red-700">
                    Create one
                </a>
            </p>
        @endif
    </form>
</x-guest-layout>
