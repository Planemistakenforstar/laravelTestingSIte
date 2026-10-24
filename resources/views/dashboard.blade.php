<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Bandcamp: paste an artist URL --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold mb-4">Stream from Bandcamp</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Paste an artist page URL (e.g. <code>https://artist.bandcamp.com</code>)
                        to browse their albums.
                    </p>
                    <x-bandcamp.artist-input />
                </div>
            </div>

            {{-- Original Breeze welcome block --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
